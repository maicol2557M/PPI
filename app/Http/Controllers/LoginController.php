<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Mostrar la vista de login
     */
    public function showLogin()
    {
        return view('login.login');
    }

    /**
     * Mostrar la vista de inicio
     */
    public function showInicio()
    {
        return view('inicio');
    }
}
