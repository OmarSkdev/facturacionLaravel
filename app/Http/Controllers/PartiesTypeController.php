<?php

namespace App\Http\Controllers;

use App\Models\PartiesTypeModel;
use App\Models\PartiesModel;
use Illuminate\Http\Request ;
use Barryvdh\DomPDF\Facade\Pdf;
use Mpdf\Mpdf;



class PartiesTypeController extends Controller
{
    //
    public function parties_type(Request $request)
   
    {
        $datos['getRegistro'] = PartiesTypeModel::getRegistroAll($request);
        return view('admin.parties_type.list', $datos);
    }

    public function parties_type_generar_pdf()
    {
        $obtTodoRegistro = PartiesTypeModel::get();
        $datos = [
            'titulo' => 'Bienvenido a Omar.com',
            'fecha' => date('m/d/Y'),
            'parties' => $obtTodoRegistro
        ];

        $pdf = PDF::loadView('PartieTypePDF', $datos);
        //$html = view('reporte-mpdf', $datos)->render();
        //$mpdf = new Mpdf();
        // Escribir el contenido HTML
        //$mpdf->WriteHTML($html);

        // Descargar o mostrar el PDF
        /* return response()->streamDownload(function() use ($mpdf) {
            $mpdf->Output();
        }, 'reporte-mpdf.pdf'); */
        return $pdf->download('factura.pdf');
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

    public function parties(Request $request)
    {
        $datos['getRegistro'] = PartiesModel::getRegistroAll($request);
        return view('admin.parties.list', $datos);

    }

    public function parties_pdf_single_descargar($id)
    {
        $datos['obtSingleRegistro'] = PartiesModel::find($id);

        $datos['html'] = '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" />';


        $datos['titulo'] = "Tutoriales de Programacion && Desarrollo Web y Scripts";

        $datos['fecha'] = date('d/m/Y');

        $pdf = Pdf::loadView('PartiesPDFSingle', $datos);
        return $pdf->download('errorsol.pdf');
    }

    public function parties_pdf_descargar(){
        //$obtTodoRegistro = PartiesModel::get();
        $obtTodoRegistro = PartiesModel::select('parties.*',
        'parties_type.parties_type_nombre')
        ->join('parties_type', 'parties_type_id', '=',
        'parties.parties_type_id')
        ->get();
        $datos = [
            'titulo' => 'Bienvenido a OmarCode.com',
            'fecha' => date('m/d/Y'),
            'parties' => $obtTodoRegistro
        ];
        $pdf = PDF::loadView('PartiesPDF', $datos);
        return $pdf->download('fact.pdf');
    }

    public function parties_add()
    {
        $datos['getPartiesType'] = PartiesTypeModel::get();
        return view('admin.parties.add', $datos);
    }

    public function parties_insertar(Request $request)
    {
        //dd($request->all());
        $guardar = new PartiesModel;
        $guardar->parties_type_id = trim($request->parties_type_id);
        $guardar->full_name = trim($request->full_name);
        $guardar->phone_no = trim($request->phone_no);
        $guardar->address = trim($request->address);
        $guardar->account_holder_name = trim($request->account_holder_name);
        $guardar->account_no = trim($request->account_no);
        $guardar->bank_name = trim($request->bank_name);
        $guardar->ifsc_code = trim($request->ifsc_code);
        $guardar->branch_address = trim($request->branch_address);
        $guardar->save();
        return redirect('admin/parties')->with('success', 'Registro creado exitósamente');
    }
}