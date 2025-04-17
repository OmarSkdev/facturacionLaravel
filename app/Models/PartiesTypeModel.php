<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class PartiesTypeModel extends Model
{
    use HasFactory;

    protected $table = 'parties_type';

    static public function getRegistroAll()
    {

        $return = self::select('parties_type.*');
        $return = $return->paginate(2);
        return $return;
    }

    static public function singleGetRegistro($id)
    {
        return self::find($id);
    }
    
}
