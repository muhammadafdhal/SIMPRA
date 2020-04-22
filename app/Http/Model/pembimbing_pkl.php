<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class pembimbing_pkl extends Model
{
    //
    protected $table = 'pembimbing_pkl';
    protected $primaryKey = 'pbb_id';
    protected $fillable = ['pbb_md_id'];
}
