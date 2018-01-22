<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Renlakgiat;
use App\User;
use App\Profile;
use Auth;
class RenlakgiatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        $renlakgiat = Renlakgiat::all();
        return view('renlakgiat.index', compact('renlakgiat'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $user = Profile::where('id','=',$id)->get();
        return view('renlakgiat.add', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $renlakgiat = new Renlakgiat;
        $renlakgiat->kejuruan = $request->kejuruan;
        $renlakgiat->program_pelatihan = $request->program_pelatihan;
        $renlakgiat->sumber_dana = $request->sumber_dana;
        $renlakgiat->durasi = $request->durasi;
        $renlakgiat->paket = $request->paket;
        $renlakgiat->orang = $request->orang;
        $renlakgiat->tgl_mulai = $request->tgl_mulai;
        $renlakgiat->tgl_selesai = $request->tgl_selesai;
        $renlakgiat->users_id = $request->users_id;
        $renlakgiat->save();
        return redirect()->route('admin.renlakgiat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $renlakgiat = Renlakgiat::where('id','=',$id)->get();
        return view('renlakgiat.edit', compact('renlakgiat'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $renlakgiat = Renlakgiat::find($id);
        $renlakgiat->kejuruan = $request->kejuruan;
        $renlakgiat->program_pelatihan = $request->program_pelatihan;
        $renlakgiat->sumber_dana = $request->sumber_dana;
        $renlakgiat->durasi = $request->durasi;
        $renlakgiat->paket = $request->paket;
        $renlakgiat->orang = $request->orang;
        $renlakgiat->tgl_mulai = $request->tgl_mulai;
        $renlakgiat->tgl_selesai = $request->tgl_selesai;
        $renlakgiat->save();
        return redirect()->route('admin.renlakgiat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $renlakgiat = Renlakgiat::find($id);
        $renlakgiat->delete();
        return redirect()->route('admin.renlakgiat');
    }
}
