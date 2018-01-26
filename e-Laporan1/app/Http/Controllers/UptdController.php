<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Renlakgiat;
use App\Laporan;
use Auth;
use carbon;
class UptdController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function indexRenlakgiat(){
    	$renlakgiat = Renlakgiat::where('users_id','=',Auth::user()->id)->get();
    	return view('user.indexRenlakgiat', compact('renlakgiat'));
    }
    public function detailRenlakgiat($id){
    	$renlakgiat = Renlakgiat::where('id','=',$id)->get();
    	return view('user.detailRenlakgiat', compact('renlakgiat'));
    }
    public function editRenlakgiat($id){
    	$renlakgiat = Renlakgiat::where('id','=',$id)->get();
    	return view('user.editRenlakgiat', compact('renlakgiat'));
    }
    public function updateRenlakgiat(Request $request, $id)
    {
        $renlakgiat = Renlakgiat::find($id);
        $renlakgiat->durasi = $request->durasi;
        $renlakgiat->orang = $request->orang;
        $renlakgiat->tgl_mulai = $request->tgl_mulai;
        $renlakgiat->tgl_selesai = $request->tgl_selesai;
        $renlakgiat->status = $request->status;
        $renlakgiat->save();
        return redirect()->route('user.renlakgiat');
    }
    public function formCover($id){
    	$renlakgiat = Renlakgiat::where('id','=',$id)->get();
    	return view('user.formCover', compact('renlakgiat'));
    }
    public function uploadCover(Request $request){
    	if ($request->hasFile('file')) {
    		$file = $request->file;
   			$extension = $file->getClientOriginalExtension();
   			$fileName = "Cover" . ' ' . $request->renlakgiat_id . '.' . $extension; 
    		$request->file('file')->move('upload', $fileName);
	    	$laporan = new Laporan;
	    	$laporan->renlakgiat_id = $request->renlakgiat_id;
	    	$laporan->nama_laporan = $fileName;
	    	$laporan->status = "Belum Terverifikasi";
	    	$laporan->catatan = "-";
	    }
	    $laporan->save();
    	return redirect('uptd/laporan/detail/'.$request->renlakgiat_id);
    }
}
