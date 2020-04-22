<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\kec;
use App\Http\Model\kabkota;
use App\Http\Model\provinsi;

class CountryController extends Controller
{
    //

    // public function provinsi()
    // {
    //     $provinsi = provinsi::all();
    //     return view('provinsi', compact('provinsi'));
    // }

    public function kabkota()
    {
        $kabkota = kabkota::all();
        return view('kabkota', compact('kabkota'));
    }

    public function kecamatan()
    {
        $id_kabkota = Input::get('id_kabkota');
        $kec = kec::where('id_kabkota', '=', $id_kabkota)->get();
        return response()->json($kec);
    }
}

