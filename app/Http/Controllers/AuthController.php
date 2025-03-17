<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


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

    public function registroPost(Request $request)
    {
        //dd($request->all());
        $user = request()->validate([
            'nombre' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6'
        ]);

        $user = new User;
        $user->name = trim($request->nombre);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('/')->with('success', 'Registro exitoso');
    }

    public function olvidarPW(Request $request)
    {
        $data['meta_title'] = 'Olvidar Contraseña Página';
        return view('auth.olvidar_pw', $data);
    }

}