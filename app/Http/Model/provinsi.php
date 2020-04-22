<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class provinsi extends Model
{
    //
    protected $table = "provinsi";
    protected $primaryKey = "provinsi_id";
    protected $fillabel = ['provinsi_nama'];
}
