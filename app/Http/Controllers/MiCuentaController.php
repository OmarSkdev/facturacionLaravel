<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MiCuentaController extends Controller
{
    public function mi_cuenta(Request $request)
    {
        $data['obtRegistro'] = User::find(Auth::user()->id);
        return view('admin.mi_cuenta.update', $data);
    }

    public function mi_cuenta_update(Request $request)
    {
        $usuario = request()->validate([
            'email' => 'required|unique:users,email,'.Auth::user()->id
        ]);
        $usuario = User::find(Auth::user()->id);
        $usuario->name = trim($request->nombre);
        $usuario->email = trim($request->email);

        if(!empty($request->password))
        {
            $usuario->password = Hash::make($request->password);
        }

        if(!empty($request->file('imagen_perfil')))
        {
            if(!empty($usuario->imagen_perfil) && 
                file_exists('upload/'.$usuario->imagen_perfil)){
                    unlink('upload/'.$usuario->imagen_perfil);
                }
            $file = $request->file('imagen_perfil');
            $randomStr = Str::random(20);
            $filename = $randomStr .'.'.$file->getClientOriginalExtension();
            $file->move('upload/', $filename);
            $usuario->imagen_perfil = $filename;
        }

        $usuario->save();
        return redirect('admin/mi_cuenta')
        ->with('success', 'Mi Cuenta ha sido actualizada..!');
    }
}