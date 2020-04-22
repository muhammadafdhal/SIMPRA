<?php

namespace App\Http\Controllers;

use App\Http\Model\nilai;
use App\User;
use Auth;
use App\Http\Model\MagangDetail;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nilai = nilai::all();
        $title = "Data Master";
        $title2 = "Tabel Nilai";
        $siswa = magangDetail::join('users','id','md_sw_id')->join('pkls','pkl_id','md_pkl_id')->orderBy('md_status_nilai', 'ASC')->get();
        return view('nilai.daftar_mhs', compact('nilai','title','title2','siswa'));
    }

    public function index2()
    {
        //
        $nilai = nilai::join('magang_details','md_id','nilai_md_id')->join('users','id','md_sw_id')->where('md_sw_id', Auth::user()->id)->get();
        $title = "Data Master";
        $title2 = "Tabel Nilai";
        $siswa = magangDetail::join('users','id','md_sw_id')->join('pkls','pkl_id','md_pkl_id')->orderBy('md_status_nilai', 'ASC')->get();
        return view('nilai.index', compact('nilai','title','title2','siswa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($md_id)
    {
        //
        $title = "Data Master";
        $title2 = "Tabel Nilai";
        $siswa = magangDetail::find($md_id);
        
        return view('nilai.create', compact('nilai','title','title2','siswa'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $md_id)
    {
        //

        $md = magangDetail::find($md_id);
        $md->md_status_nilai = "Sudah";
        $md->save();

        $nilai = new nilai();
        $nilai->nilai_md_id = $md_id;
        $nilai->nilai_kedisiplinan = $request['nilai_kedisiplinan'];
        $nilai->nilai_kreatifitas = $request['nilai_kreatifitas'];
        $nilai->nilai_penguasaanMateri = $request['nilai_penguasaanMateri'];
        $nilai->nilai_kehadiran = $request['nilai_kehadiran'];
        $nilai->nilai_tanggungJawab = $request['nilai_tanggungJawab'];
        $nilai->nilai_komunikasi = $request['nilai_komunikasi'];
        $nilai->save();

        return redirect('/nilai')->with('sukses','Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        //
        $nilai = nilai::find($id);
        $title = "Data Master";
        $title2 = "Tabel Nilai";
        return view('nilai.edit', compact('nilai','title','title2'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        //
        $nilai = nilai::find($id);
        $nilai->nilai_kedisiplinan = $request['nilai_kedisiplinan'];
        $nilai->nilai_kreatifitas = $request['nilai_kreatifitas'];
        $nilai->nilai_kreatifitas = $request['nilai_penguasaanMateri'];
        $nilai->nilai_kreatifitas = $request['nilai_kehadiran'];
        $nilai->nilai_kreatifitas = $request['nilai_tanggungJawab'];
        $nilai->nilai_kreatifitas = $request['nilai_komunikasi'];
        $nilai->save();
        return redirect('/nilai')->with('update','Data Barhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $nilai = nilai::find($id);
        $nilai->delete();
        return redirect('/nilai')->with('delete','Data Berhasil Di Hapus');
    }
}
