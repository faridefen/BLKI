<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laporan;
use Auth;
use App\User;
use Storage;

class PengecekController extends Controller
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


    // public function checkverifikasi(){
    //     $notif = Laporan::where("status","=","Belum terverifikasi");
    //     $count = count($notif);
    //     return view('layouts.app', compact('count'));
    // }

    public function index()
    {
        $notif = \DB::table('laporans')->where("status","=","Belum terverifikasi")->count();
        $laporan = Laporan::orderBy('users_id','asc')->orderBy('created_at','asc')->get();
        return view('pengecek.index', compact('laporan'), compact('notif'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // public function get($file){
    
    //     $entry = \DB::table('laporans')->where('file', '=', $file)->first();
    //     $filez = public_path('upload')->$file;
 
    //     return (new Response($file, 200))
    //           ->header('Content-Type', $entry->mime);
    // }
 

    public function show($file)
    {
        $destinationPath = public_path('upload');
        $path = $destinationPath."/".$file;
        return Response()->file($path);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $notif = \DB::table('laporans')->where("status","=","Belum terverifikasi")->count();
        $laporan = Laporan::where('id','=',$id)->get();
        return view('pengecek.edit', compact('laporan'), compact('notif'));
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
        $laporan = Laporan::find($id);
        $laporan->status = $request->status;
        $laporan->catatan = $request->catatan;
        $laporan->save();
        return redirect()->route('admin.cek');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $destinationPath = public_path('upload');
        $filess =  \DB::table('laporans')->where('id','$id')->value('file');
        $laporan = Laporan::find($id);
        Storage::delete($destinationPath."/".$filess);
        $laporan->delete();

        return redirect()->route('admin.cek');
    }

}
