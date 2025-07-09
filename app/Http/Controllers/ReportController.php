<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Procesos;
use App\Models\Responsables;
use App\Models\Personal;
use App\Models\Tipos;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ReportController extends Controller
{
    /**
     * Mostrar dashboard con estadísticas
     */
    public function dashboard()
    {
        $statistics = $this->getStatistics();
        return view('reports.dashboard', compact('statistics'));
    }

    /**
     * Generar reporte general
     */
    public function generateReport(Request $request)
    {
        $type = $request->get('type', 'general');
        
        switch ($type) {
            case 'usuarios':
                $data = User::with('tipo')->get();
                break;
            case 'procesos':
                $data = Procesos::with(['tipo', 'usuario'])->get();
                break;
            case 'responsables':
                $data = Responsables::with('usuario')->get();
                break;
            case 'personal':
                $data = Personal::all();
                break;
            case 'asesoria_derecho':
                $tipo = Tipos::where('nombre_tipos', 'Asesoría Derecho')->first();
                if ($tipo) {
                    $data = Procesos::with(['tipo', 'usuario'])
                        ->where('id_tipos', $tipo->id_tipos)
                        ->get();
                } else {
                    $data = [];
                }
                break;
            default:
                $data = [
                    'usuarios' => User::count(),
                    'procesos' => Procesos::count(),
                    'responsables' => Responsables::count(),
                    'personal' => Personal::count(),
                ];
        }

        return response()->json([
            'success' => true,
            'data' => $data,
            'type' => $type
        ]);
    }

    /**
     * Exportar datos a CSV
     */
    public function exportCSV(Request $request)
    {
        $type = $request->get('type', 'usuarios');
        
        switch ($type) {
            case 'usuarios':
                $data = User::with('tipo')->get();
                $filename = 'usuarios_' . date('Y-m-d') . '.csv';
                break;
            case 'procesos':
                $data = Procesos::with(['tipo', 'usuario'])->get();
                $filename = 'procesos_' . date('Y-m-d') . '.csv';
                break;
            case 'responsables':
                $data = Responsables::with('usuario')->get();
                $filename = 'responsables_' . date('Y-m-d') . '.csv';
                break;
            case 'personal':
                $data = Personal::all();
                $filename = 'personal_' . date('Y-m-d') . '.csv';
                break;
            default:
                return response()->json(['success' => false, 'message' => 'Tipo de reporte no válido']);
        }

        return Excel::download(new class($data, $type) implements FromCollection, WithHeadings {
            private $data;
            private $type;

            public function __construct($data, $type)
            {
                $this->data = $data;
                $this->type = $type;
            }

            public function collection()
            {
                return $this->data;
            }

            public function headings(): array
            {
                switch ($this->type) {
                    case 'usuarios':
                        return ['ID Cédula', 'Nombre', 'Dirección', 'Teléfono', 'Email', 'Tipo'];
                    case 'procesos':
                        return ['ID', 'Control Activos', 'Fecha Adquisición', 'Depreciación', 'Proveedor', 'Valor', 'Tipo'];
                    case 'responsables':
                        return ['ID', 'Administrador', 'ID Cédula'];
                    case 'personal':
                        return ['ID', 'Cédula', 'Nombres', 'Apellidos', 'Teléfono', 'Cargo'];
                    default:
                        return [];
                }
            }
        }, $filename);
    }

    /**
     * Exportar datos a PDF
     */
    public function exportPDF(Request $request)
    {
        $type = $request->get('type', 'usuarios');
        
        switch ($type) {
            case 'usuarios':
                $data = User::with('tipo')->get();
                $title = 'Reporte de Usuarios';
                break;
            case 'procesos':
                $data = Procesos::with(['tipo', 'usuario'])->get();
                $title = 'Reporte de Procesos';
                break;
            case 'responsables':
                $data = Responsables::with('usuario')->get();
                $title = 'Reporte de Responsables';
                break;
            case 'personal':
                $data = Personal::all();
                $title = 'Reporte de Personal';
                break;
            default:
                return response()->json(['success' => false, 'message' => 'Tipo de reporte no válido']);
        }

        $pdf = PDF::loadView('reports.pdf', compact('data', 'title'));
        return $pdf->download($type . '_' . date('Y-m-d') . '.pdf');
    }

    /**
     * Obtener estadísticas sumarizadas
     */
    public function getStatistics()
    {
        $statistics = [
            'total_usuarios' => User::count(),
            'total_procesos' => Procesos::count(),
            'total_responsables' => Responsables::count(),
            'total_personal' => Personal::count(),
            'total_tipos' => Tipos::count(),
            'avg_valor_mantenimiento' => Procesos::avg('valor_mantenimiento'),
            'sum_valor_mantenimiento' => Procesos::sum('valor_mantenimiento'),
            'procesos_por_tipo' => Procesos::select('id_tipos', DB::raw('count(*) as total'))
                ->with('tipo')
                ->groupBy('id_tipos')
                ->get(),
            'usuarios_por_tipo' => User::select('id_tipos', DB::raw('count(*) as total'))
                ->with('tipo')
                ->groupBy('id_tipos')
                ->get(),
            'procesos_recientes' => Procesos::where('created_at', '>=', now()->subDays(30))->count(),
            'administradores' => Responsables::where('administrador', true)->count(),
        ];

        return $statistics;
    }

    /**
     * API para obtener estadísticas
     */
    public function apiStatistics()
    {
        return response()->json([
            'success' => true,
            'statistics' => $this->getStatistics()
        ]);
    }

    /**
     * Reporte detallado con filtros
     */
    public function detailedReport(Request $request)
    {
        $filters = $request->all();
        
        $query = Procesos::with(['tipo', 'usuario']);
        
        if (isset($filters['fecha_desde'])) {
            $query->where('fecha_adquisicion', '>=', $filters['fecha_desde']);
        }
        
        if (isset($filters['fecha_hasta'])) {
            $query->where('fecha_adquisicion', '<=', $filters['fecha_hasta']);
        }
        
        if (isset($filters['tipo_id'])) {
            $query->where('id_tipos', $filters['tipo_id']);
        }
        
        if (isset($filters['valor_min'])) {
            $query->where('valor_mantenimiento', '>=', $filters['valor_min']);
        }
        
        if (isset($filters['valor_max'])) {
            $query->where('valor_mantenimiento', '<=', $filters['valor_max']);
        }
        
        $data = $query->get();
        
        return response()->json([
            'success' => true,
            'data' => $data,
            'filters' => $filters,
            'total' => $data->count()
        ]);
    }
}