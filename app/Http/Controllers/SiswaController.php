<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Hash;

class SiswaController extends Controller
{
    //
    public function tampil()
    {
        $title = "Data Master";
        $title2 = "Tabel Siswa";
        $siswa = user::where("us_level","Siswa")->get();
        return view('data-siswa.index', compact('siswa','title','title2'));
    }

    public function create()
    {
        $title = "Data Master";
        $title2 = "Tabel Siswa";
        $siswa = user::all();
        return view('data-siswa.create', compact('siswa','title','title2'));
    }

    public function store(Request $request)
    {
        $siswa = new user;
        $siswa->us_level = "Siswa";
        $siswa->name = $request['name'];
        $siswa->password = Hash::make($request['password']);
        $siswa->email = $request['email'];
        $siswa->us_nim = $request['us_nim'];
        $siswa->us_alamat = $request['us_alamat'];
        $siswa->us_no = $request['us_no'];
        $siswa->us_jurusan = $request['us_jurusan'];
        $berkas1 = $request->file('us_foto');
        $namaFile1 = $berkas1->getClientOriginalName();
        $request->file('us_foto')->move('gambar/fotoMahasiswa/', $namaFile1);
        $siswa->us_foto=$namaFile1;
        $siswa->us_tmp_lahir = $request['us_tmp_lahir'];
        $siswa->us_tgl_lahir = $request['us_tgl_lahir'];
        $siswa->save();

        return redirect('/siswa')->with('sukses','Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $title = "Data Master";
        $title2 = "Tabel Siswa";
        $siswa = user::find($id);
        return view('data-siswa.edit', compact('siswa','title','title2'));
    }

    public function update(Request $request, $id)
    {
        $siswa = user::find($id);
        $siswa->us_level = "Siswa";
        $siswa->name = $request['name'];
        $siswa->password = Hash::make($request['password']);
        $siswa->email = $request['email'];
        $siswa->us_nim = $request['us_nim'];
        $siswa->us_alamat = $request['us_alamat'];
        $siswa->us_no = $request['us_no'];
        $siswa->us_jurusan = $request['us_jurusan'];
        $siswa->us_foto = $request['us_foto'];
        $hps = $berkas->us_foto;
        File::delete('gambar/fotoMahasiswa/'. $hps);
        $berkas1 = $request->file('us_foto');
        $namaFile1 = $berkas1->getClientOriginalName();
        $request->file('us_foto')->move('gambar/fotoMahasiswa/', $namaFile1);
        $siswa->us_foto=$namaFile1;
        $siswa->us_tmp_lahir = $request['us_tmp_lahir'];
        $siswa->us_tgl_lahir = $request['us_tgl_lahir'];
        $siswa->save();

        return redirect('/siswa')->with('update','Data Barhasil Di Update');
    }

    public function destroy($id)
    {
        $siswa = user::find($id);
        $siswa->delete();

        return redirect('/siswa')->with('delete','Data Berhasil Di Hapus');
    }
}
