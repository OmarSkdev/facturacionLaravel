<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class GSTBillsModel extends Model
{
    use HasFactory;

    protected $table = 'gst_bills';

    static public function getRegistroAll($request)
    {

        $return = self::select('gst_bills.*', 'parties_type.parties_type_nombre');
        $return = $return->join('parties_type', 'parties_type.id', 'gst_bills.parties_type_id');
        
        if(!empty(Request::get('id')))
        {
            $return = $return->where('gst_bills.id', '=', Request::get('id'));
        }

        if(!empty(Request::get('parties_type_nombre')))
        {
            $return = $return->where('parties_type.parties_type_nombre', 'like', 
                '%' .Request::get('parties_type_nombre').'%');
        }

        if(!empty(Request::get('fecha_factura')))
        {
            $return = $return->where('gst_bills.fecha_factura', 'like', 
                '%' .Request::get('fecha_factura').'%');
        }

        if(!empty(Request::get('nro_factura')))
        {
            $return = $return->where('gst_bills.nro_factura', 'like', 
                '%' .Request::get('nro_factura').'%');
        }

        if(!empty(Request::get('monto_total')))
        {
            $return = $return->where('gst_bills.monto_total', 'like', 
                '%' .Request::get('monto_total').'%');
        }
        

        $return = $return->paginate(3);
        return $return;
    }

    public function get_parties_type_nombre()
    {
        return $this->belongsTo(PartiesTypeModel::class, 'parties_type_id');
    }
}