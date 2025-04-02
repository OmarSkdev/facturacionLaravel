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
        
        $return = $return->paginate(2);
        return $return;
    }

    static public function singleGetRegistro($id)
    {
        return self::find($id);
    }
}
