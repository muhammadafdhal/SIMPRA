<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\File;
use App\Rules\MatchOldPassword;
use Hash;

class ProfileController extends Controller
{
    //
    public function index()
    {

        return view('profile.index', compact('profile'));
    }

    public function update(Request $request, $id)
    {
        $profile = user::find($id);
        $profile->name = $request['name'];
        $profile->us_nim = $request['us_nim'];
        $profile->email = $request['email'];
        $profile->us_no = $request['us_no'];
        $profile->us_alamat = $request['us_alamat'];
        $profile->save();

        return redirect('/profile')->with('status-profile','Data Berhasil DiUpdate');
    }

    public function setting()
    {
        return view('profile.setting');
    }

    public function change(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        return redirect('/home')->with('status-password','Password Berhasil DiUpdate');

    }
}
