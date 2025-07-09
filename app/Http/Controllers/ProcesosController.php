<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Procesos;

class ProcesosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('procesos.asesoria_derecho');
    }

    public function auditoria()
    {
        return view('procesos.auditoria_fiscal');
    }

    public function capacitacion()
    {
        return view('procesos.capacitacion_legislativa');
    }

    public function consultaJuridica()
    {
        return view('procesos.consulta_juridica_empresarial');
    }

    public function consultaTributaria()
    {
        return view('procesos.consulta_tributaria');
    }

    public function defensa()
    {
        return view('procesos.defensa_fiscal');
    }

    public function planeacion()
    {
        return view('procesos.planeacion_fiscal');
    }

    public function regulacion()
    {
        return view('procesos.regulacion_fiscal');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
        $validated = $request->validate([
            'control_activos' => 'required|string|max:255',
            'fecha_adquisicion' => 'required|date',
            'depreciacion' => 'required|numeric',
            'fecha_ultimo_mantenimiento' => 'required|date',
            'fecha_proximo_mantenimiento' => 'required|date',
            'proveedor_mantenimiento' => 'required|string|max:255',
            'valor_mantenimiento' => 'required|numeric',
            'id_tipos' => 'required|integer',
            'id_cedula' => 'required|integer',
        ]);
        $proceso = Procesos::create($validated);
        return response()->json(['success' => true, 'proceso' => $proceso]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al crear el proceso: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
        $validated = $request->validate([
            'control_activos' => 'required|string|max:255',
            'fecha_adquisicion' => 'required|date',
            'depreciacion' => 'required|numeric',
            'fecha_ultimo_mantenimiento' => 'required|date',
            'fecha_proximo_mantenimiento' => 'required|date',
            'proveedor_mantenimiento' => 'required|string|max:255',
            'valor_mantenimiento' => 'required|numeric',
            'id_tipos' => 'required|integer',
            'id_cedula' => 'required|integer',
        ]);
        $proceso = Procesos::findOrFail($id);
        $proceso->update($validated);
        return response()->json(['success' => true, 'proceso' => $proceso]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al actualizar el proceso: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
        $proceso = Procesos::findOrFail($id);
        $proceso->delete();
        return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar el proceso: ' . $e->getMessage()], 500);
        }
    }

    // API: obtener todos los procesos
    public function apiIndex()
    {
        return response()->json(Procesos::with(['tipo', 'usuario'])->get());
    }

    // API: obtener un proceso individual
    public function apiShow($id)
    {
        $proceso = \App\Models\Procesos::with(['tipo', 'usuario'])->findOrFail($id);
        return response()->json($proceso);
    }
}
