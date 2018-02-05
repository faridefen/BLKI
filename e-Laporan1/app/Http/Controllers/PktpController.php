<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Renlakgiat;
use App\Pktp;
use Auth;
use Storage;

class PktpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    public function indexpktp($id){
        $renlakgiat = Renlakgiat::where('id',$id)->get();
	    $pktp = Pktp::where('renlakgiat_id',$id)->orderBy('nama','asc')->paginate(5);
	    return view('user.indexpktp', compact('pktp'), compact('renlakgiat'));
    }

    public function create($id){
	   $renlakgiat = Renlakgiat::where('id',$id)->get();
	   return view('user.addpktp', compact('renlakgiat'));
    }

    public function store(Request $request)
    {

    	if($request->hasFile('foto')){
                $request->file('foto')->move('upload', $request->foto->getClientOriginalName());     
            }

        $pktp = new pktp;
        $pktp->nama = $request->nama;
        $pktp->nip = $request->nip;
        $pktp->pangkat = $request->pangkat;
        $pktp->jabatan = $request->jabatan;
        $pktp->kedudukan = $request->kedudukan;
        $pktp->alamat = $request->alamat;
        $pktp->nohp = $request->nohp;
        $pktp->foto = $request->foto->getClientOriginalName();
        $pktp->renlakgiat_id = $request->renlakgiat_id;
        $pktp->save();
        return redirect('uptd/pktp/'.$request->renlakgiat_id);
    }

    public function destroy($id){
        $destinationPath = public_path('upload');
        $filess =  \DB::table('pktps')->where('id','$id')->value('foto');
        $pktp = Pktp::find($id);
        Storage::delete($destinationPath."/".$filess);
        $pktp->delete();

        return redirect()->back();
    }

    public function editpktp($id){
        $pktp = Pktp::where('id',$id)->get();
        return view('user.editPktp', compact('pktp'));
    }

    public function update(Request $request, $id){
        $pktp = Pktp::where('id',$id)->get();
        foreach ($pktp as $key => $value) {
           $renlakgiatid = $value->renlakgiat_id;        }
        $pktps = Pktp::find($id);
        if($request->hasFile('foto')){
                $request->file('foto')->move('upload', $request->foto->getClientOriginalName());
                $pktps->nama = $request->nama;
                $pktps->nip = $request->nip;
                $pktps->pangkat = $request->pangkat;
                $pktps->jabatan = $request->jabatan;
                $pktps->kedudukan = $request->kedudukan;
                $pktps->alamat = $request->alamat;
                $pktps->nohp = $request->nohp;
                $pktps->foto = $request->foto->getClientOriginalName();
            }else{
                $pktps->nama = $request->nama;
                $pktps->nip = $request->nip;
                $pktps->pangkat = $request->pangkat;
                $pktps->jabatan = $request->jabatan;
                $pktps->kedudukan = $request->kedudukan;
                $pktps->alamat = $request->alamat;
                $pktps->nohp = $request->nohp;
            }
            $pktps->save(); 
            return redirect('uptd/pktp/'.$renlakgiatid);
                
        }
}

