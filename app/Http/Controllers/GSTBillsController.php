<?php
namespace App\Http\Controllers;

use App\Models\PartiesTypeModel;
use Illuminate\Http\Request;

class GSTBillsController extends Controller
{
    public function gst_bills()
    {
        return view('admin.gst_bills.list');
    }

    public function gst_insertar()
    {
        $data['obtenerPartiesType'] = PartiesTypeModel::get();
        return view('admin.gst_bills.add', $data);
    }
}