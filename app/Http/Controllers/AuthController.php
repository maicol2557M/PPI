<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Mostrar formulario de login
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Procesar login con validación de credenciales optimizada
     */
    public function login(Request $request)
    {
        // Validación básica
        $validator = Validator::make($request->all(), [
            'id_cedula' => 'required|numeric',
            'password' => 'required|string|min:6',
        ], [
            'id_cedula.required' => 'La cédula es obligatoria',
            'id_cedula.numeric' => 'La cédula debe ser numérica',
            'password.required' => 'La contraseña es obligatoria',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        // Buscar usuario por cédula (una sola consulta)
        $user = User::where('id_cedula', $request->id_cedula)->first();

        if (!$user) {
            return redirect()->back()
                ->withErrors(['id_cedula' => 'Credenciales inválidas'])
                ->withInput($request->except('password'));
        }

        // Verificar contraseña de forma más eficiente
        $isValidPassword = false;
        
        if ($user->password) {
            // Usuario tiene contraseña hasheada
            $isValidPassword = Hash::check($request->password, $user->password);
        } else {
            // Usuario sin contraseña, usar cédula como contraseña temporal
            $isValidPassword = ($request->password == $user->id_cedula);
        }

        if (!$isValidPassword) {
            return redirect()->back()
                ->withErrors(['password' => 'Credenciales inválidas'])
                ->withInput($request->except('password'));
        }

        // Autenticar usuario
        Auth::login($user);
        Session::regenerate();

        return redirect()->intended('/inicio');
    }

    /**
     * Cerrar sesión
     */
    public function logout(Request $request)
    {
        Auth::logout();
        Session::flush();
        Session::regenerate();
        
        return redirect('/');
    }

    /**
     * Mostrar formulario de registro
     */
    public function showRegister()
    {
        return view('auth.register');
    }

    /**
     * Registrar nuevo usuario optimizado
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_cedula' => 'required|numeric|unique:usuarios,id_cedula',
            'nombre' => 'required|string|max:255',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
            'correo_electronico' => 'nullable|email|unique:usuarios,correo_electronico',
        ], [
            'id_cedula.unique' => 'Esta cédula ya está registrada',
            'password.confirmed' => 'Las contraseñas no coinciden',
            'correo_electronico.unique' => 'Este correo ya está registrado',
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
            
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except(['password', 'password_confirmation']));
        }

        try {
            // Crear usuario con contraseña hasheada
            $user = User::create([
                'id_cedula' => $request->id_cedula,
                'nombre' => $request->nombre,
                'password' => Hash::make($request->password),
                'correo_electronico' => $request->correo_electronico,
            ]);

            // Autenticar automáticamente
            Auth::login($user);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Usuario registrado exitosamente. Redirigiendo...'
                ]);
            }

            return redirect('/inicio')->with('success', 'Usuario registrado exitosamente');
            
        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al registrar usuario. Intenta de nuevo.'
                ], 500);
            }
            
            return redirect()->back()
                ->withErrors(['error' => 'Error al registrar usuario. Intenta de nuevo.'])
                ->withInput($request->except(['password', 'password_confirmation']));
        }
    }

    /**
     * Cambiar contraseña
     */
    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed',
            'new_password_confirmation' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $user = Auth::user();

        // Verificar contraseña actual
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Contraseña actual incorrecta']);
        }

        // Actualizar contraseña usando Query Builder para evitar problemas de linter
        User::where('id_cedula', $user->id_cedula)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->back()->with('success', 'Contraseña actualizada exitosamente');
    }

    /**
     * Verificar si el usuario está autenticado
     */
    public function checkAuth()
    {
        if (Auth::check()) {
            return response()->json([
                'authenticated' => true,
                'user' => Auth::user()
            ]);
        }

        return response()->json(['authenticated' => false]);
    }
} 