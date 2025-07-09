<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Procesos;
use App\Models\Responsables;
use App\Models\Personal;
use App\Models\Tipos;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    /**
     * Obtener estadísticas generales
     */
    public function generalStatistics()
    {
        $statistics = [
            'total_usuarios' => User::count(),
            'total_procesos' => Procesos::count(),
            'total_responsables' => Responsables::count(),
            'total_personal' => Personal::count(),
            'total_tipos' => Tipos::count(),
            'avg_valor_mantenimiento' => Procesos::avg('valor_mantenimiento'),
            'sum_valor_mantenimiento' => Procesos::sum('valor_mantenimiento'),
            'max_valor_mantenimiento' => Procesos::max('valor_mantenimiento'),
            'min_valor_mantenimiento' => Procesos::min('valor_mantenimiento'),
            'procesos_recientes' => Procesos::where('created_at', '>=', now()->subDays(30))->count(),
            'administradores' => Responsables::where('administrador', true)->count(),
        ];

        return response()->json([
            'success' => true,
            'statistics' => $statistics
        ]);
    }

    /**
     * Estadísticas por tipo de proceso
     */
    public function statisticsByType()
    {
        $statistics = Procesos::select('id_tipos', DB::raw('count(*) as total'), DB::raw('avg(valor_mantenimiento) as avg_valor'), DB::raw('sum(valor_mantenimiento) as sum_valor'))
            ->with('tipo')
            ->groupBy('id_tipos')
            ->get();

        return response()->json([
            'success' => true,
            'statistics' => $statistics
        ]);
    }

    /**
     * Estadísticas por usuario
     */
    public function statisticsByUser()
    {
        $statistics = Procesos::select('id_cedula', DB::raw('count(*) as total_procesos'), DB::raw('sum(valor_mantenimiento) as total_valor'))
            ->with('usuario')
            ->groupBy('id_cedula')
            ->orderBy('total_procesos', 'desc')
            ->get();

        return response()->json([
            'success' => true,
            'statistics' => $statistics
        ]);
    }

    /**
     * Estadísticas por fecha
     */
    public function statisticsByDate(Request $request)
    {
        $startDate = $request->get('start_date', now()->subMonths(6)->format('Y-m-d'));
        $endDate = $request->get('end_date', now()->format('Y-m-d'));

        $statistics = Procesos::select(
                DB::raw('DATE(fecha_adquisicion) as fecha'),
                DB::raw('count(*) as total_procesos'),
                DB::raw('sum(valor_mantenimiento) as total_valor'),
                DB::raw('avg(valor_mantenimiento) as avg_valor')
            )
            ->whereBetween('fecha_adquisicion', [$startDate, $endDate])
            ->groupBy('fecha')
            ->orderBy('fecha')
            ->get();

        return response()->json([
            'success' => true,
            'statistics' => $statistics,
            'period' => [
                'start_date' => $startDate,
                'end_date' => $endDate
            ]
        ]);
    }

    /**
     * Top 10 procesos por valor
     */
    public function topProcessesByValue()
    {
        $topProcesses = Procesos::with(['tipo', 'usuario'])
            ->orderBy('valor_mantenimiento', 'desc')
            ->limit(10)
            ->get();

        return response()->json([
            'success' => true,
            'top_processes' => $topProcesses
        ]);
    }

    /**
     * Resumen financiero
     */
    public function financialSummary()
    {
        $summary = [
            'total_investment' => Procesos::sum('valor_mantenimiento'),
            'avg_investment_per_process' => Procesos::avg('valor_mantenimiento'),
            'total_processes' => Procesos::count(),
            'processes_by_value_range' => [
                'low' => Procesos::where('valor_mantenimiento', '<', 1000000)->count(),
                'medium' => Procesos::whereBetween('valor_mantenimiento', [1000000, 5000000])->count(),
                'high' => Procesos::where('valor_mantenimiento', '>', 5000000)->count(),
            ],
            'monthly_trend' => Procesos::select(
                DB::raw('YEAR(fecha_adquisicion) as year'),
                DB::raw('MONTH(fecha_adquisicion) as month'),
                DB::raw('sum(valor_mantenimiento) as total_value'),
                DB::raw('count(*) as total_processes')
            )
            ->groupBy('year', 'month')
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->limit(12)
            ->get()
        ];

        return response()->json([
            'success' => true,
            'financial_summary' => $summary
        ]);
    }

    /**
     * Consulta optimizada con joins
     */
    public function optimizedQuery()
    {
        $result = DB::table('procesos')
            ->join('tipos', 'procesos.id_tipos', '=', 'tipos.id_tipos')
            ->join('usuarios', 'procesos.id_cedula', '=', 'usuarios.id_cedula')
            ->select(
                'procesos.id_procesos',
                'procesos.control_activos',
                'procesos.valor_mantenimiento',
                'tipos.nombre_tipos',
                'usuarios.nombre as usuario_nombre'
            )
            ->where('procesos.valor_mantenimiento', '>', 0)
            ->orderBy('procesos.valor_mantenimiento', 'desc')
            ->limit(20)
            ->get();

        return response()->json([
            'success' => true,
            'optimized_data' => $result
        ]);
    }
} 