<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personal;

class PersonalController extends Controller
{
    public function index()
    {
        return view('usuarios.registro_personal');
    }

    public function store(Request $request)
    {
        try {
        $validated = $request->validate([
            'cedula' => 'required|string|max:20',
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'cargo' => 'nullable|string|max:100',
        ]);
        $personal = Personal::create($validated);
        return response()->json(['success' => true, 'personal' => $personal]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al crear el personal: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
        $validated = $request->validate([
            'cedula' => 'required|string|max:20',
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'telefono' => 'nullable|string|max:20',
            'cargo' => 'nullable|string|max:100',
        ]);
        $personal = Personal::findOrFail($id);
        $personal->update($validated);
        return response()->json(['success' => true, 'personal' => $personal]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al actualizar el personal: ' . $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
        $personal = Personal::findOrFail($id);
        $personal->delete();
        return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar el personal: ' . $e->getMessage()], 500);
        }
    }

    // API: obtener todos los registros
    public function apiIndex()
    {
        return response()->json(Personal::get());
    }
    // API: obtener un registro individual
    public function apiShow($id)
    {
        $personal = Personal::findOrFail($id);
        return response()->json($personal);
    }
}
