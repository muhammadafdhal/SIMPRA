<?php

namespace App\Http\Controllers;

use App\Http\Model\magangDetail;
use App\Http\Model\pkl;
use App\user;
use App\Htpp\Model\guru;
use App\Http\Model\pembimbing_pkl;
use Illuminate\Http\Request;
use Auth;

class MagangDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        $md = magangDetail::join('users','id','md_sw_id')->join('pkls','pkl_id','md_pkl_id')->where('magang_details.md_sw_id', Auth::user()->id)->get();
        $admin = magangDetail::join('users','id','md_sw_id')->join('pkls','pkl_id','md_pkl_id')->where('md_status','=','Belum')->get();
        $title = "Data Master";
        $title2 = "Tabel Magang";
        return view('magang-detail.index', compact('md','title','title2','admin'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kelompok = magangDetail::join('users','id','md_sw_id')->join('pkls','pkl_id','md_pkl_id')->get();
        // elequent left join tabel pkl dengan magang detail
        // $pkl = pkl::leftJoin('magang_details','md_pkl_id','pkl_id')->get();
        $pkl = pkl::all();
        $user = user::all();
        $title = "Data Master";
        $title2 = "Tabel Magang";
        return view('magang-detail.create', compact('pkl','user','title','title2','kelompok'));

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
        $md = new magangDetail;
        $md->md_sw_id = Auth::user()->id;
        $md->md_pkl_id = $request['md_pkl_id'];
        $md->save();
        return redirect('/md')->with('status-magang','Tempat Magang Berhasil Dipilih');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\magangDetail  $magangDetail
     * @return \Illuminate\Http\Response
     */
    public function show(magangDetail $magangDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\magangDetail  $magangDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($md_id)
    {
        //
        $md = magangDetail::find($md_id);
        $pkl = pkl::all();
        $user = user::all();
        $title = "Data Master";
        $title2 = "Tabel Magang";
        return view('magang-detail.edit', compact('md','pkl','user','title','title2'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\magangDetail  $magangDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $md_id)
    {
        //
        $md = magangDetail::find($md_id);
        $md->md_pkl_id = $request['md_pkl_id'];
        $md->save();
        return redirect('/md')->with('status-magang','Tempat Magang Berhasil Dipilih');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\magangDetail  $magangDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        $md = magangDetail::find($id);
        $md->delete();
        return redirect('/md');
    }

    public function tampilPembimbing()
    {
        $title = "Data Master";
        $title2 = "Tabel Magang";
        $pbb = pembimbing_pkl::join('magang_details','md_id','pbb_md_id')->join('pkls','pkl_id','md_pkl_id')->join('users','id','md_sw_id')->get();
        foreach($pbb as $value){
            $guru = user::where('id',$value->pbb_gr_id)->first();
            $value['nama_guru'] = $guru->name;
        } 

        $pbb2 = pembimbing_pkl::join('magang_details','md_id','pbb_md_id')->join('pkls','pkl_id','md_pkl_id')->join('users','id','md_sw_id')->where('pbb_gr_id', Auth::user()->id)->get();
        foreach($pbb2 as $value){
            $guru = user::where('id',$value->pbb_gr_id)->first();
            $value['nama_guru'] = $guru->name;
        } 

        $pbb3 = pembimbing_pkl::join('magang_details','md_id','pbb_md_id')->join('pkls','pkl_id','md_pkl_id')->join('users','id','md_sw_id')->where('md_sw_id', Auth::user()->id)->get();
        foreach($pbb3 as $value){
            $guru = user::where('id',$value->pbb_gr_id)->first();
            $value['nama_guru'] = $guru->name;
            $value['nip'] = $guru->us_nim;
            $value['no'] = $guru->us_no;
        } 
        
        return view('pembimbing-pkl.index', compact('title','title2','pbb','pbb2','pbb3'));
    }

    public function pilihPembimbing($md_id)
    {
        $md = magangDetail::find($md_id);
        $title = "Data Master";
        $title2 = "Tabel Magang";
        $pbb = user::where("us_level","Guru")->get();
        return view('pembimbing-pkl.create', compact('pbb','title','title2','md'));
    }

    public function simpanPembimbing(Request $request, $md_id)
    {

        $md = magangDetail::find($md_id);
        $md->md_status = "Sudah";
        $md->save();

        $pbb = new pembimbing_pkl;
        $pbb->pbb_md_id = $md_id;
        $pbb->pbb_gr_id = $request['pbb_gr_id'];
        $pbb->save();
        return redirect('/pbb');
    }

    
}
