<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class pkl extends Model
{
    //
    protected $table = "pkls";
    protected $primaryKey = "pkl_id";
    protected $fillabel = ['pkl_nama_sekolah','pkl_profil','pkl_no','pkl_kec_id'];
}
