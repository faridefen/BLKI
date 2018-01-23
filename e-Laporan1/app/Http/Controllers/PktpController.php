<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Renlakgiat;
use App\Pktp;
use Auth;
use Storage;

class PktpController extends Controller
{
    
public function indexpktp($id){

	$pktp = Pktp::where('renlakgiat_id',$id)->get();
	return view('user.indexpktp', compact('pktp'));
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

}

