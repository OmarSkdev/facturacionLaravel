<?php

namespace App\Http\Controllers;

use App\Models\ConfiguracionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;


class ConfiguracionController extends Controller
{
    public function configuracion(Request $request)
    {
        $datos['obtRegistro'] = ConfiguracionModel::find(1);
        return view('admin.configuracion.update', $datos);
    }

    public function configuracion_update(Request $request)
    {
        //dd($request->all());
        $guardar = ConfiguracionModel::find(1);
        $guardar->nombre_web = trim($request->nombre_web);

        if(!empty($request->file('logo')))
        {
            if(!empty($guardar->logo) && 
                file_exists('upload/'.$guardar->logo)){
                    unlink('upload/'.$guardar->logo);
                }
            $file = $request->file('logo');
            $randomStr = Str::random(20);
            $filename = $randomStr .'.'.$file->getClientOriginalExtension();
            $file->move('upload/', $filename);
            $guardar->logo = $filename;
        }

        if(!empty($request->file('favicono')))
        {
            if(!empty($guardar->favicono) && 
                file_exists('upload/'.$guardar->favicono)){
                    unlink('upload/'.$guardar->favicono);
                }
            $file = $request->file('favicono');
            $randomStr = Str::random(20);
            $filename = $randomStr .'.'.$file->getClientOriginalExtension();
            $file->move('upload/', $filename);
            $guardar->favicono = $filename;
        }
        $guardar->save();

        return redirect('admin/configuracion')->with('success', 'Configuración actualizada
        exitósamente');
    }
}