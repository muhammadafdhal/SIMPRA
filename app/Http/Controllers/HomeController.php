<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Model\berkas;
use App\Http\Model\magangDetail;
use App\Http\Model\pkl;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vb = berkas::where('berkas_status','=','Belum')->get();
        $vp = magangDetail::where('md_status','=','Belum')->get();
        $vn = magangDetail::where('md_status_nilai','=','Belum')->get();
        $pkl = pkl::all();

        return view('home',compact('vb','vp','vn','pkl'));
    }
}
