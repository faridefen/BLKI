<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Laporan;
use Auth;
class PenginputController extends Controller
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
        $laporan = Laporan::where('users_id','=',Auth::user()->id)->get();
        return view('penginput.index',compact('laporan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penginput.add');
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
            'namafile' => 'required|min:6',
            'file' => 'required|mimes:pdf|max:1000000'
        ]); 
        
       if ($request->hasFile('file')) {
            $laporan = new Laporan;
            $file = $request->file('file');
            $name = $file->getClientOriginalName();
            $destinationPath = public_path('upload');
            $file->move($destinationPath, $name);
            $laporan->namafile = $request->namafile;
            $laporan->file = $name;
            $laporan->status = "Belum terverifikasi";
            $laporan->catatan = "Belum ada catatan";
            $laporan->users_id = Auth::user()->id;
            $laporan->save();
        }
        return redirect('penginput')->with(compact('destinationPath'));
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
