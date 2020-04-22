<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class nilai extends Model
{
    //
    protected $table = "nilais";
    protected $primaryKey = "nilai_id";
    protected $fillabel = ['nilai_kedisiplinan','nilai_kreatifitas','nilai_penguasaanMateri','nilai_kehadiran','nilai_tanggungJawab','nilai_komunikasi'];
}
