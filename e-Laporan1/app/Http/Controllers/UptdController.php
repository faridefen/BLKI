<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Renlakgiat;
use App\Laporan;
use Auth;
use Carbon\Carbon;
use Hash;
use Session;
use App\User;
use App\Dokumen;
use PDF;
class UptdController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function indexRenlakgiat(){
    	$renlakgiat = Renlakgiat::where('users_id','=',Auth::user()->id)->get();
    	return view('user.indexRenlakgiat', compact('renlakgiat','current'));
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
        return redirect()->route('uptd.renlakgiat');
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
        Session::flash('message', 'Berhasil Upload Cover'); 
        Session::flash('alert-class', 'alert-success'); 
    	return redirect('uptd/laporan/detail/'.$request->renlakgiat_id);
    }
    public function cetakRenlakgiat($id){
        $renlakgiat = Renlakgiat::where('id',$id)->get();
        $pdf = PDF::loadView('user.cetakRenlakgiat',compact('renlakgiat'));
        return $pdf->stream('Renlakgiat.pdf');
    }

    public function editpass($id){
        $user = user::where('id', $id)->get();
        return view('user.editpass', compact('user'));


    }
    public function verif(Request $request, $id){

         $user = Auth::user();

        $old = $request->old;
        $new = $request->new;
        $confirm = $request->confirm;

        $user = User::find($id);
        $check = User::where('password', $old)->where('id', $id)->get();
        $cek = count($check);




        if (Hash::check($old, $user->password)) {
             $user->password = bcrypt($new);
            $user->save();

            Session::flash('message', 'Berhasil Ubah Password'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect('profile');
           
        }
        else
        {
            Session::flash('message', 'Password lama salah!'); 
            Session::flash('alert-class', 'alert-danger'); 

            return redirect()->back();
        }

    }
    Public function indexDokumen(){
        $dokumen = Dokumen::orderBy('updated_at','desc')->get();
        return view('user.indexDokumen', compact('dokumen'));
    }
}
