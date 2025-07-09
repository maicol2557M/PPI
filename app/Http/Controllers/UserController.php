<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        return view('usuarios.registro_usuario');
    }

    public function store(Request $request)
    {
        try {
        $validated = $request->validate([
            'id_cedula' => 'required|numeric',
            'nombre' => 'required|string|max:255',
            'direccion_domicilio' => 'nullable|string|max:255',
            'numero_telefonico' => 'nullable|string|max:20',
            'correo_electronico' => 'nullable|email|max:255',
            // Agrega aquí los demás campos según tu migración
        ]);
        $user = User::create($validated);
        return response()->json(['success' => true, 'user' => $user]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al crear el usuario: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion_domicilio' => 'nullable|string|max:255',
            'numero_telefonico' => 'nullable|string|max:20',
            'correo_electronico' => 'nullable|email|max:255',
            // Agrega aquí los demás campos según tu migración
        ]);
        $user = User::findOrFail($id);
        $user->update($validated);
        return response()->json(['success' => true, 'user' => $user]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al actualizar el usuario: ' . $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar el usuario: ' . $e->getMessage()], 500);
        }
    }

    // API: obtener todos los usuarios
    public function apiIndex()
    {
        return response()->json(User::with('tipo')->get());
    }
    // API: obtener un usuario individual
    public function apiShow($id)
    {
        $user = User::with('tipo')->findOrFail($id);
        return response()->json($user);
    }
}
