<?php

namespace App\Http\Controllers;

use App\Http\Model\berkas;
use App\user;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\File;

class BerkasController extends Controller
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
        $title2 = "Tabel Berkas";
        $berkas = berkas::join('users','id','berkas_sw_id')->where('berkas.berkas_sw_id', Auth::user()->id)->get();
        // $cek = berkas::join('users','id','berkas_sw_id')->where('berkas.berkas_sw_id', Auth::user()->id)->get();
        return view('berkas.index', compact('title','title2','berkas'));
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
        $title2 = "Table Berkas";
        $berkas = berkas::all();
        return view('berkas.create', compact('title','title2','berkas'));
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
        $berkas = new berkas;
        $berkas->berkas_sw_id = Auth::user()->id;
        $berkas1 = $request->file('berkas_fotoSurat');
        $namaFile1 = $berkas1->getClientOriginalName();
        $request->file('berkas_fotoSurat')->move('gambar/berkasSurat/', $namaFile1);
        $berkas->berkas_fotoSurat=$namaFile1;
        $berkas->berkas_status = "Belum";
        $berkas->berkas_jenis = $request['berkas_jenis'];
        $berkas->save();
        return redirect('/berkas')->with('sukses','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\berkas  $berkas
     * @return \Illuminate\Http\Response
     */
    public function show(berkas $berkas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\berkas  $berkas
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $title = "Data Master";
        $title2 = "Tabel Berkas";
        $berkas = berkas::find($id);
        return view('berkas.edit', compact('title','title2','berkas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\berkas  $berkas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $berkas = berkas::find($id);
        $hps = $berkas->berkas_fotoSurat;
        File::delete('gambar/berkasSurat/'. $hps);
        $berkas1 = $request->file('berkas_fotoSurat');
        $namaFile1 = $berkas1->getClientOriginalName();
        $request->file('berkas_fotoSurat')->move('gambar/berkasSurat/', $namaFile1);
        $berkas->berkas_fotoSurat=$namaFile1;
        $berkas->berkas_sw_id = Auth::user()->id;
        $berkas->berkas_status = "Belum";
        $berkas->berkas_jenis = $request['berkas_jenis'];
        $berkas->save();
        return redirect('/berkas')->with('update','Data Barhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\berkas  $berkas
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $berkas = berkas::find($id);
        $berkas->delete();
        return redirect('/berkas')->with('delete','Data Berhasil Di Hapus');
    }

    public function verified( $id)
    {
        $berkas = berkas::find($id);
        $berkas->berkas_status='Sudah';
        $berkas->save();

        return redirect('/berkas')->with('verified', 'Data Telah Diverifikasi');
    }

    public function notverified( $id)
    {
        $berkas = berkas::find($id);
        $berkas->berkas_status='Belum';
        $berkas->save();

        return redirect('/berkas')->with('notverified', 'Berhasil Membatalkan Verifikasi');
    }
}
