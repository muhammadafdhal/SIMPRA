<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class kec extends Model
{
    //
    protected $table = "kec";
    protected $primaryKey = "kec_id";
    protected $fillabel = ['id_kabkota','kec_nama'];
}
