<?php

namespace App\Http\Controllers;

use App\Http\Model\pkl;
use Auth;
use App\Http\Model\kec;
use App\Http\Model\kabkota;
use App\Http\Model\provinsi;
use Illuminate\Http\Request;

class PklController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $title = "Data Master";
        $title2 = "Tabel Tempat PKL";
        $pkl = pkl::join('kabkota','kabkota.kabkota_id','=','pkl_kec_id')->get();
        // $kelompok = pkl::join('users','id','pkl_sw_id')->where('pkls.pkl_sw_id', Auth::user()->id)->get();
        // $pkl = pkl::join('kec','kec.id','=','id_kec')->join('kabkota','kabkota.id','=','id_kabkota')
        // ->join('provinsi','provinsi.id','=','id_provinsi')->select('*','kec.nama as nama_kec',
        //         'kabkota.nama as nama_kabkota','provinsi.nama as nama_provinsi','perusahaans.nama as nama_perusahaan',
        //         'perusahaans.id as id_perusahaan')->get();

        
        return view('data-pkl.index', compact('pkl','title','title2'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = "Data Master";
        $title2 = "Tabel Siswa";
        // $provinsi = provinsi::all();
        $pkl = pkl::all();
        $kabkota = kabkota::all();
        return view('data-pkl.create', compact('kabkota','pkl','title','title2'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $pkl = new pkl;
        $pkl->pkl_nama_sekolah = $request['pkl_nama_sekolah'];
        $pkl->pkl_profil = $request['pkl_profil'];
        $pkl->pkl_no = $request['pkl_no'];
        $pkl->pkl_kec_id = $request['pkl_kec_id'];
        $pkl->save();
        return redirect('/pkl')->with('sukses','Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pkl  $pkl
     * @return \Illuminate\Http\Response
     */
    public function show(pkl $pkl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pkl  $pkl
     * @return \Illuminate\Http\Response
     */
    public function edit($pkl_id)
    {
        //
        $title = "Data Master";
        $title2 = "Tabel Siswa";
        $pkl = pkl::join('kec','kec.id','=','id_kec')->join('kabkota','kabkota.id','=','id_kabkota')->
        join('provinsi','provinsi.id','=','id_provinsi')->select('*','kec.nama as nama_kec',
        'kabkota.nama as nama_kabkota','provinsi.nama as nama_provinsi','provinsi.id as id_prov','perusahaans.nama as nama_perusahaan',
        'perusahaans.id as id_perusahaan')->where('perusahaans.id','=', $pkl)->get();
        $kabkota = kabkota::all();
        
        return view('data-pkl.edit', compact('pkl','kabkota','title','title2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pkl  $pkl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $pkl_id)
    {
        //
        $pkl = pkl::find($pkl_id);
        $pkl->pkl_nama_sekolah = $request['pkl_nama_sekolah'];
        $pkl->pkl_profil = $request['pkl_profil'];
        $pkl->pkl_no = $request['pkl_no'];
        $pkl->pkl_kec_id = $request['pkl_kec_id'];
        $pkl->save();
        return redirect('/pkl')->with('info','Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pkl  $pkl
     * @return \Illuminate\Http\Response
     */
    public function destroy( $pkl_id)
    {
        //
        $pkl = pkl::find($pkl_id);
        $pkl->delete();
        return redirect('/pkl');
    }

    // public function provinsi()
    // {
    //     $provinsi = provinsi::all();
    //     return view('data-pkl.create', compact('provinsi'));
    // }

    // public function kabkota()
    // {
    //     $id_provinsi = Input::get('id_provinsi');
    //     $kabkota = kabkota::where('id_provinsi', '=', $id_provinsi)->get();
    //     return response()->json($kabkota);
    // }

    // public function kecamatan()
    // {
    //     $id_kabkota = Input::get('id_kabkota');
    //     $kec = kec::where('id_kabkota', '=', $id_kabkota)->get();
    //     return response()->json($kec);
    // }
}
