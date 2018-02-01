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
        $laporan = Laporan::where('renlakgiat_id',$id)->get();
    	$renlakgiat = Renlakgiat::where('id','=',$id)->get();
    	return view('user.detailRenlakgiat', compact('renlakgiat','laporan'));
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

    public function formCover($id){
        $renlakgiat = Renlakgiat::where('id',$id)->get();
        return view('user.formCover', compact('renlakgiat'));
    }


    public function uploadCover(Request $request, $id){
        $this->validate($request, [
            'file' => 'required|file|mimes:pdf|max:500',
        ]);
            if ($request->hasFile('file')) {
                $file = $request->file;
                $extension = $file->getClientOriginalExtension();
                $fileName = "Cover" . ' ' . $request->renlakgiat_id . '.' . $extension; 
                $request->file('file')->move('upload', $fileName);
                $renlakgiat = Renlakgiat::find($id);
                $renlakgiat->cover = $fileName;
                $renlakgiat->status_cover = "Belum Terverifikasi";
                $renlakgiat->catatan_cover = "-";
            }
            $renlakgiat->save();
            Session::flash('message', 'Berhasil Upload Cover'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect('uptd/laporan/detail/'.$request->renlakgiat_id);
    }
    
    public function formPendahuluan($id){
        $renlakgiat = Renlakgiat::where('id',$id)->get();
        return view('user.formPendahuluan', compact('renlakgiat'));
    }


    public function uploadPendahuluan($id, Request $request ){
        $this->validate($request,[
            'file' => 'mimes:pdf',
            'file' => 'file|max:500',
        ]);
        if ($request->hasFile('file')) {
                $file = $request->file;
                $extension = $file->getClientOriginalExtension();
                $fileName = "pendahuluan" . ' ' . $request->renlakgiat_id . '.' . $extension; 
                $request->file('file')->move('upload', $fileName);
                $renlakgiat = Renlakgiat::find($id);
                $renlakgiat->pendahuluan = $fileName;
                $renlakgiat->status_pendahuluan = "Belum Terverifikasi";
                $renlakgiat->catatan_pendahuluan = "-";
            }
            $renlakgiat->save();
            Session::flash('message', 'Berhasil Upload pendahuluan'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect('uptd/laporan/detail/'.$request->renlakgiat_id);
    }
    public function formSK($id){
        $renlakgiat = Renlakgiat::where('id',$id)->get();
        return view('user.formSK', compact('renlakgiat'));
    }


    public function uploadSK($id, Request $request ){
        $this->validate($request,[
            'file' => 'mimes:pdf',
            'file' => 'file|max:500',
        ]);
        if ($request->hasFile('file')) {
                $file = $request->file;
                $extension = $file->getClientOriginalExtension();
                $fileName = "SK" . ' ' . $request->renlakgiat_id . '.' . $extension; 
                $request->file('file')->move('upload', $fileName);
                $renlakgiat = Renlakgiat::find($id);
                $renlakgiat->surat_keputusan = $fileName;
                $renlakgiat->status_surat_keputusan = "Belum Terverifikasi";
                $renlakgiat->catatan_surat_keputusan = "-";
            }
            $renlakgiat->save();
            Session::flash('message', 'Berhasil Upload surat keputusan'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect('uptd/laporan/detail/'.$request->renlakgiat_id);
    }
    public function formNPP($id){
        $renlakgiat = Renlakgiat::where('id',$id)->get();
        return view('user.formNPP', compact('renlakgiat'));
    }


    public function uploadNPP($id, Request $request ){
        $this->validate($request,[
            'file' => 'mimes:pdf',
            'file' => 'file|max:500',
        ]);

        if ($request->hasFile('file')) {
                $file = $request->file;
                $extension = $file->getClientOriginalExtension();
                $fileName = "Nominatif Peserta Pelatihan" . ' ' . $request->renlakgiat_id . '.' . $extension; 
                $request->file('file')->move('upload', $fileName);
                $renlakgiat = Renlakgiat::find($id);
                $renlakgiat->nominatif_peserta_pelatihan = $fileName;
                $renlakgiat->status_nominatif_peserta_pelatihan = "Belum Terverifikasi";
                $renlakgiat->catatan_nominatif_peserta_pelatihan = "-";
            }
            $renlakgiat->save();
            Session::flash('message', 'Berhasil Upload Nominatif Peserta Pelatihan'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect('uptd/laporan/detail/'.$request->renlakgiat_id);
    }
    public function formNI($id){
        $renlakgiat = Renlakgiat::where('id',$id)->get();
        return view('user.formNI', compact('renlakgiat'));
    }


    public function uploadNI($id, Request $request ){
        $this->validate($request,[
            'file' => 'mimes:pdf',
            'file' => 'file|max:500',
        ]);

        if ($request->hasFile('file')) {
                $file = $request->file;
                $extension = $file->getClientOriginalExtension();
                $fileName = "Nominatif Instruktur" . ' ' . $request->renlakgiat_id . '.' . $extension; 
                $request->file('file')->move('upload', $fileName);
                $renlakgiat = Renlakgiat::find($id);
                $renlakgiat->nominatif_instruktur = $fileName;
                $renlakgiat->status_nominatif_instruktur = "Belum Terverifikasi";
                $renlakgiat->catatan_nominatif_instruktur = "-";
            }
            $renlakgiat->save();
            Session::flash('message', 'Berhasil Upload Nominatif Instruktur'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect('uptd/laporan/detail/'.$request->renlakgiat_id);
    }
}
