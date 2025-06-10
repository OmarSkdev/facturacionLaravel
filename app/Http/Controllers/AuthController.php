<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Mail\OlvidarPassword;


class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $data['meta_title'] = 'Login Página';
        return view('auth.login', $data);
    }

    public function loginPost(Request $request)
    {
    
        //dd($request->all());
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password
            ], true))
        {
            if(Auth::User()->is_role == '1')
            {
                return redirect()->intended('admin/dashboard');
            }
            else
            {
                return redirect('/')->with('error', 'Admin no disponible');
            }
        }
        else
        {
            return redirect()->back()->with('error', 'Por favor ingresar credenciales correctas');
        }
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

    public function olvidarPW()
    {
        $data['meta_title'] = 'Olvidar Contraseña Página';
        return view('auth.olvidar_pw', $data);
    }

    public function olvidarPW_post(Request $request)
    {
        //dd($request->all());
        $conteo = User::where('email', '=', $request->email)->count();
        if ($conteo > 0)
        {
            $usuario = User::where('email', '=', $request->email)->first();
            $random_pass = rand(111111111,99999999);
            $usuario->password = Hash::make($random_pass);
            $usuario->save();
            
            Mail::to($usuario->email)->send(new OlvidarPassword($usuario, $random_pass));

            return redirect()->back()->with('success', 'Password ha sido enviado al email');
        } else {
            return redirect()->back()->with('error', 'Email no encontrado');
        }
        
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}