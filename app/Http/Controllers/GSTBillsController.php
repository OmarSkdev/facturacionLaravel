<?php
namespace App\Http\Controllers;

use App\Models\GSTBillsModel;
use App\Models\PartiesTypeModel;
use Illuminate\Http\Request;

class GSTBillsController extends Controller
{
    public function gst_bills()
    {
        //$data['getRegistro'] = GSTBillsModel::get();
        $data['getRegistro'] = GSTBillsModel::getRegistroAll();
        return view('admin.gst_bills.list', $data);
    }

    public function gst_insertar()
    {
        $data['obtenerPartiesType'] = PartiesTypeModel::get();
        return view('admin.gst_bills.add', $data);
    }

    public function gst_bills_insertar(Request $request)
    {
        //dd($request->all());
        $guardar = new GSTBillsModel;
        $guardar->parties_type_id = trim($request->parties_type_id);
        $guardar->fecha_factura = trim($request->fecha_factura);
        $guardar->nro_factura = trim($request->nro_factura);
        $guardar->item_descripcion = trim($request->item_descripcion);
        $guardar->monto_total = trim($request->monto_total);
        $guardar->cgst_tasa = trim($request->cgst_tasa);
        $guardar->sgst_tasa = trim($request->sgst_tasa);
        $guardar->igst_tasa = trim($request->igst_tasa);
        $guardar->monto_cgst = trim($request->monto_cgst);
        $guardar->monto_sgst = trim($request->monto_sgst);
        $guardar->monto_igst = trim($request->monto_igst);
        $guardar->monto_impuesto = trim($request->monto_impuesto);
        $guardar->monto_neto = trim($request->monto_neto);
        $guardar->declaracion = trim($request->declaracion);
        $guardar->save();
    }

    public function gst_bills_edit($id)
    {
        $data['obtenerPartiesType'] = PartiesTypeModel::get();        
        $data['getRegistro'] = GSTBillsModel::find($id);
        return view('admin.gst_bills.edit', $data);
    }

    public function gst_bills_update($id, Request $request)
    {
        $guardar = GSTBillsModel::find($id);
        $guardar->parties_type_id = trim($request->parties_type_id);
        $guardar->fecha_factura = trim($request->fecha_factura);
        $guardar->nro_factura = trim($request->nro_factura);
        $guardar->item_descripcion = trim($request->item_descripcion);
        $guardar->monto_total = trim($request->monto_total);
        $guardar->cgst_tasa = trim($request->cgst_tasa);
        $guardar->sgst_tasa = trim($request->sgst_tasa);
        $guardar->igst_tasa = trim($request->igst_tasa);
        $guardar->monto_cgst = trim($request->monto_cgst);
        $guardar->monto_sgst = trim($request->monto_sgst);
        $guardar->monto_igst = trim($request->monto_igst);
        $guardar->monto_impuesto = trim($request->monto_impuesto);
        $guardar->monto_neto = trim($request->monto_neto);
        $guardar->declaracion = trim($request->declaracion);
        $guardar->save();

        return redirect('admin/gst_bills')->with('success', 'Registro guardado correctamente');
    }

    public function gst_bills_delete($id)
    {
        $eliminar = GSTBillsModel::find($id);
        $eliminar->delete();

        return redirect('admin/gst_bills')->with('success', 'Registro eliminado correctamente');
    }

    public function gst_bills_view($id)
    {
        $data['getRegistro'] = GSTBillsModel::find($id);
        return view('admin.gst_bills.view', $data);
    }

    

   
}