<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class berkas extends Model
{
    //
    protected $table = "berkas";
    protected $primaryKey = "berkas_id";
    protected $fillable = ["berkas_sw_id","berkas_fotoSurat","berkas_status","berkas_jenis"];
}
