<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $profile = Profile::where('users_id','=',Auth::user()->id)->get();
        return view('profile.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            if($request->hasFile('foto_pimpinan') && $request->hasFile('foto_gedung')){
                $request->file('foto_pimpinan')->move('upload', $request->foto_pimpinan->getClientOriginalName());
                $request->file('foto_gedung')->move('upload', $request->foto_gedung->getClientOriginalName());

                
            }
                
                $profile = new Profile;
                $profile->users_id = Auth::user()->id;
                $profile->nama_lembaga = $request->nama_lembaga;
                $profile->eselonisasi = $request->eselonisasi;
                $profile->provinsi = $request->provinsi;
                $profile->kab_kota = $request->kab_kota;
                $profile->alamat = $request->alamat;
                $profile->no_telp = $request->no_telp;
                $profile->no_fax = $request->no_fax;
                $profile->email_kantor = $request->email_kantor;
                $profile->website = $request->website;
                $profile->nama_pimpinan = $request->nama_pimpinan;
                $profile->no_hp_pimpinan = $request->no_hp_pimpinan;
                $profile->foto_pimpinan = $request->foto_pimpinan->getClientOriginalName();
                $profile->foto_gedung = $request->foto_gedung->getClientOriginalName();
                $profile->save();
                return redirect()->route('profile');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
