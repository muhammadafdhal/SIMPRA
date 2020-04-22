<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class magangDetail extends Model
{
    //
    protected $table = "magang_details";
    protected $primaryKey = "md_id";
    protected $fillable = ['md_sw_id','md_pkl_id'];
}
