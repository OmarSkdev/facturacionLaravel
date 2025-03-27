<?php

namespace App\Http\Controllers;

use App\Models\PartiesTypeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PartiesTypeController extends Controller
{
    //
    public function parties_type()
   
    {
        $datos['getRegistro'] = PartiesTypeModel::getRegistroAll();
        return view('admin.parties_type.list', $datos);
    }

    public function parties_type_add()
    {
        return view('admin.parties_type.add');
    }

    public function parties_type_insert(Request $request)
    {
        //dd($request->all());
        $guardar = request()->validate([
            'parties_type_name' => 'required'
        ]);

        $guardar = new PartiesTypeModel;
        $guardar->parties_type_nombre = trim($request->parties_type_name);
        $guardar->save();

        return redirect('admin/parties_type')->with('success', 'Registro creado exitosamente');
    }
}