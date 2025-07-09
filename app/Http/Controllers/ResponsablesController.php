<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Responsables;

class ResponsablesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('usuarios.responsables');
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
                'administrador' => 'required|boolean',
            'id_cedula' => 'required|integer',
        ]);
        $responsable = Responsables::create($validated);
        return response()->json(['success' => true, 'responsable' => $responsable]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al crear el responsable: ' . $e->getMessage()], 500);
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
                'administrador' => 'required|boolean',
            'id_cedula' => 'required|integer',
        ]);
        $responsable = Responsables::findOrFail($id);
        $responsable->update($validated);
        return response()->json(['success' => true, 'responsable' => $responsable]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al actualizar el responsable: ' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
        $responsable = Responsables::findOrFail($id);
        $responsable->delete();
        return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar el responsable: ' . $e->getMessage()], 500);
        }
    }

    // API: obtener todos los responsables
    public function apiIndex()
    {
        return response()->json(Responsables::with('usuario')->get());
    }
    // API: obtener un responsable individual
    public function apiShow($id)
    {
        $responsable = Responsables::with('usuario')->findOrFail($id);
        return response()->json($responsable);
    }
}
