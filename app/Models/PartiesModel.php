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

        $return = self::select('parties.*');
        $return = $return->paginate(3);
        return $return;
    }

    static public function singleGetRegistro($id)
    {
        return self::find($id);
    }
}
