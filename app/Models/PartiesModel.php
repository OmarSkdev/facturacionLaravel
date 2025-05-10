<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class PartiesModel extends Model
{
    use HasFactory;

    protected $table = 'parties';

    static public function getRegistroAll()
    {

        $return = self::select('parties.*', 'parties_type.parties_type_nombre');
        $return = $return->join('parties_type', 'parties_type.id', 'parties.parties_type_id');

        if(!empty(Request::get('id')))
        {
            $return = $return->where('parties.id', '=', Request::get('id'));
        }

        if(!empty(Request::get('parties_type_nombre')))
        {
            $return = $return->where('parties_type.parties_type_nombre', 'like', 
                '%' .Request::get('parties_type_nombre').'%');
        }

        if(!empty(Request::get('created_at')))
        {
            $return = $return->where('parties.created_at', 'like', 
                '%' .Request::get('created_at').'%');
        }

        if(!empty(Request::get('full_name')))
        {
            $return = $return->where('parties.full_name', 'like', 
                '%' .Request::get('full_name').'%');
        }

        if(!empty(Request::get('phone_no')))
        {
            $return = $return->where('parties.phone_no', 'like', 
                '%' .Request::get('phone_no').'%');
        }

        if(!empty(Request::get('created_at')))
        {
            $return = $return->where('parties.created_at', 'like', 
                '%' .Request::get('created_at').'%');
        }
        
        $return = $return->paginate(2);
        return $return;
    }

    static public function singleGetRegistro($id)
    {
        return self::find($id);
    }

    public function obt_parties_type_nombre()
    {
        return $this->belongsTo(PartiesTypeModel::class, 'parties_type_id');
    }
}
