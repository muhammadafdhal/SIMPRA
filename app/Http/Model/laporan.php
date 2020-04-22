<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class laporan extends Model
{
    //
    protected $table = "laporans";
    protected $primaryKey = "lp_id";
    protected $fillable = ['lp_file'];
}
