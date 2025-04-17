<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Request;

class GSTBillsModel extends Model
{
    use HasFactory;

    protected $table = 'gst_bills';

    static public function getRegistroAll()
    {

        $return = self::select('gst_bills.*', 'parties_type.parties_type_nombre');
        $return = $return->join('parties_type', 'parties_type.id', 'gst_bills.parties_type_id');
        
        $return = $return->paginate(3);
        return $return;
    }

    public function get_parties_type_nombre()
    {
        return $this->belongsTo(PartiesTypeModel::class, 'parties_type_id');
    }
}