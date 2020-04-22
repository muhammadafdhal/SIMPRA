<?php

namespace App\Http\Controllers;

use App\Http\Model\laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Response;

class LaporanController extends Controller
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
        $title2 = "Tabel Laporan";
        $laporan = laporan::all();
        return view('laporan.index', compact('title','title2','laporan'));
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
        $title2 = "Tabel Laporan";
        $laporan = laporan::all();
        return view('laporan.create', compact('title','title2','laporan'));
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
        $laporan = new laporan;
        $berkas1 = $request->file('lp_file');
        $namaFile1 = $berkas1->getClientOriginalName();
        $request->file('lp_file')->move('dokumen/laporan/', $namaFile1);
        $laporan->lp_file=$namaFile1;
        $laporan->save();
        return redirect('/laporan')->with('sukses','Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $laporan = laporan::find($id);
        $title = "Data Master";
        $title2 = "Tabel Laporan";
        return view('laporan.edit', compact('title','title2','laporan'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $laporan = laporan::find($id);
        // $laporan->lp_file = $request['lp_file'];
        $hps = $laporan->lp_file;
        File::delete('dokumen/laporan/'. $hps);
        $berkas1 = $request->file('lp_file');
        $namaFile1 = $berkas1->getClientOriginalName();
        $request->file('lp_file')->move('dokumen/laporan/', $namaFile1);
        $laporan->lp_file=$namaFile1;
        $laporan->save();
        return redirect('/laporan')->with('update','Data Barhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $laporan = laporan::find($id);
        $laporan->delete();
        return redirect('/laporan')->with('delete','Data Berhasil Di Hapus');
    }

    public function download($lp_file)
    {
        $file= public_path(). "/dokumen/laporan/".$lp_file;

        $headers = array(
              'Content-Type: application/docx',
            );

    return Response::download($file, 'laporan.docx', $headers);
    }
}
