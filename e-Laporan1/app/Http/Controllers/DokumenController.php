<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dokumen;
use Auth;
use Session;
use Carbon\Carbon;
use App\User;

class DokumenController extends Controller
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
        $dokumen = Dokumen::all();
        return view('dokumen.index', compact('dokumen'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dokumen.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|min:6',
            'isi' => 'required',
            'file' => 'required|mimes:pdf|max:500',
        ]);

        if($request->hasFile('file')){
                $request->file('file')->move('dokumen', $request->file->getClientOriginalName());     
        }

        $dokumen = new Dokumen;
        $dokumen->judul = $request->judul;
        $dokumen->isi = $request->isi;
        $dokumen->file = $request->file->getClientOriginalName();
        
        $dokumen->save();
        Session::flash('message','Berhasil Menambahkan Dokumen Khusus untuk diberikan ke seluruh UPTD/BLK');
        return redirect()->route('dokumen');

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
        $dokumen = Dokumen::where('id',$id)->get();
        return view('dokumen.edit', compact('dokumen'));
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
        $dokumen = Dokumen::find($id);
        $dokumen->delete();
        Session::flash('message','Berhasil Menghapus Dokumen Khusus untuk diberikan ke seluruh UPTD/BLK');    
        return redirect()->route('dokumen');
    }
}