<?php

namespace App\Http\Controllers;

use App\Models\PartiesTypeModel;
use App\Models\PartiesModel;
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

    public function parties_type_edit($id, Request $request)
    {
        //dd($id);
        //$datos['getRegistro'] = PartiesTypeModel::find($id);
        $datos['getRegistro'] = PartiesTypeModel::singleGetRegistro($id);
        return view('admin.parties_type.edit', $datos);
    }

    public function parties_type_update($id, Request $peticion)
    {
        //dd($peticion->all());
        $datos = PartiesTypeModel::singleGetRegistro($id);
        $datos->parties_type_nombre = trim($peticion->parties_type_name);
        $datos->save();

        return redirect('admin/parties_type/')
        ->with('success', 'Registro agregado exitosamente');
    }

    public function parties_type_delete($id)
    {
        //dd($peticion->all());
        $datos = PartiesTypeModel::singleGetRegistro($id);
        $datos->delete();

        return redirect('admin/parties_type/')
        ->with('success', 'Registro eliminado exitosamente');
    }

    public function parties()
    {
        return view('admin.parties.list');
    }

    public function parties_add()
    {
        $datos['getPartiesType'] = PartiesTypeModel::get();
        return view('admin.parties.add', $datos);
    }
}