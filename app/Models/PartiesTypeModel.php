<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Http\Request;
use Request;


class PartiesTypeModel extends Model
{
    use HasFactory;

    protected $table = 'parties_type';

    static public function getRegistroAll($request)
    {

        $return = self::select('parties_type.*');

        if(!empty(Request::get('id')))
        {
            $return = $return->where('parties_type.id', '=', Request::get('id'));
        }

        if(!empty(Request::get('parties_type_nombre')))
        {
            $return = $return->where('parties_type.parties_type_nombre', 'like', 
                '%' .Request::get('parties_type_nombre').'%');
        }

        if(!empty(Request::get('created_at')))
        {
            $return = $return->where('parties_type.created_at', 'like', 
                '%' .Request::get('created_at').'%');
        }

        if(!empty(Request::get('created_at')))
        {
            $return = $return->where('parties_type.created_at', 'like', 
                '%' .Request::get('created_at').'%');
        }

        if(!empty(Request::get('updated_at')))
        {
            $return = $return->where('parties_type.updated_at', 'like', 
                '%' .Request::get('updated_at').'%');
        }

        $return = $return->paginate(2);
        return $return;
    }

    static public function singleGetRegistro($id)
    {
        return self::find($id);
    }
    
}
