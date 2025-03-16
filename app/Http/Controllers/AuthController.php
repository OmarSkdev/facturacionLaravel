<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $data['meta_title'] = 'Login Página';
        return view('auth.login', $data);
    }

    public function registro(Request $request)
    {
        $data['meta_title'] = 'Registro Página';
        return view('auth.registro', $data);
    }

    public function olvidarPW(Request $request)
    {
        $data['meta_title'] = 'Olvidar Contraseña Página';
        return view('auth.olvidar_pw', $data);
    }

}