<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use Hash;

class PembimbingController extends Controller
{
    //
    public function tampil()
    {
        $title = "Data Master";
        $title2 = "Tabel pembimbing";
        $pembimbing = user::where("us_level","Guru")->get();
        return view('data-pembimbing.index', compact('pembimbing','title','title2'));
    }

    public function create()
    {
        $title = "Data Master";
        $title2 = "Tabel pembimbing";
        $pembimbing = user::all();
        return view('data-pembimbing.create', compact('pembimbing','title','title2'));
    }

    public function store(Request $request)
    {
        $pembimbing = new user;
        $pembimbing->us_level = "Guru";
        $pembimbing->name = $request['name'];
        $pembimbing->password = Hash::make($request['password']);
        $pembimbing->email = $request['email'];
        $pembimbing->us_nim = $request['us_nim'];
        $pembimbing->us_alamat = $request['us_alamat'];
        $pembimbing->us_no = $request['us_no'];
        
        $pembimbing->us_tmp_lahir = $request['us_tmp_lahir'];
        $pembimbing->us_tgl_lahir = $request['us_tgl_lahir'];
        $pembimbing->save();

        return redirect('/pem')->with('sukses','Data Berhasil Di Tambahkan');
    }

    public function edit($id)
    {
        $title = "Data Master";
        $title2 = "Tabel pembimbing";
        $pembimbing = user::find($id);
        return view('data-pembimbing.edit', compact('pembimbing','title','title2'));
    }

    public function update(Request $request, $id)
    {
        $pembimbing = user::find($id);
        $pembimbing->us_level = "Guru";
        $pembimbing->name = $request['name'];
        $pembimbing->password = Hash::make($request['password']);
        $pembimbing->email = $request['email'];
        $pembimbing->us_nim = $request['us_nim'];
        $pembimbing->us_alamat = $request['us_alamat'];
        $pembimbing->us_no = $request['us_no'];
        
        $pembimbing->us_tmp_lahir = $request['us_tmp_lahir'];
        $pembimbing->us_tgl_lahir = $request['us_tgl_lahir'];
        $pembimbing->save();

        return redirect('/pem')->with('update','Data Barhasil Di Update');
    }

    public function destroy($id)
    {
        $pembimbing = user::find($id);
        $pembimbing->delete();

        return redirect('/pem')->with('delete','Data Berhasil Di Hapus');
    }
}
