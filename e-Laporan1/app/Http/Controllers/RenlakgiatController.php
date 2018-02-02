<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Renlakgiat;
use App\User;
use App\Profile;
use App\Admin;
use App\Laporan;
use Carbon\Carbon;
use PDF;
use Session;
use Excel;
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
    
    public function uptdrenlakgiat($id){
     $profile = Profile::where('id', $id)->get();
     $id = Profile::where('id',$id)->get();
        foreach ($id as $c) {
                $users_id = $c->users_id;
        }
     $renlakgiat = Renlakgiat::where('users_id',$users_id)->get();    
     return view('renlakgiat.index', compact('renlakgiat','profile'));
    }

    public function index()
    {   
        $profile = Profile::all();
        $renlakgiat = Renlakgiat::all();
        return view('renlakgiat.index', compact('renlakgiat','profile'));
    }

    public function indexadmin()
    {   
        $renlakgiat = Renlakgiat::paginate(10);
        return view('admin.indexRenlakgiat', compact('renlakgiat','profile'));
    }


    public function detailrenlakgiat()
    {
        $renlakgiat = Renlakgiat::all();
        return view('renlakgiat.indexdetail', compact('renlakgiat'));
    }
    public function cetakRenlakgiat($id){
        $renlakgiat = Renlakgiat::where('id',$id)->get();
        $pdf = PDF::loadView('user.cetakRenlakgiat',compact('renlakgiat'));
        return $pdf->download('Renlakgiat.pdf');
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
        $profile = Profile::where('id', $request->users_id)->get();
        $renlakgiat = new Renlakgiat;
        $renlakgiat->kejuruan = $request->kejuruan;
        $renlakgiat->program_pelatihan = $request->program_pelatihan;
        $renlakgiat->sumber_dana = $request->sumber_dana;
        $renlakgiat->durasi = $request->durasi;
        $renlakgiat->paket = $request->paket;
        $renlakgiat->orang = $request->orang;
        $renlakgiat->users_id = $request->users_id;
        $renlakgiat->save();
        return redirect()->route('admin.profile','profile');
    }

    public function uploadform($id)
    {
        $user = Profile::where('id','=',$id)->get();
        return view('renlakgiat.upload', compact('user'));
    }


    public function upload(Request $request, $id){

        $upload = $request->file('excel');
        
        $filepath = $upload->getRealPath();

        $file = fopen($filepath, 'r');

        $header = fgetcsv($file);

        $row = fgetcsv($file);

        $id = Profile::where('id',$id)->get();
            foreach ($id as $c) {
                $users_id = $c->users_id;
            }


        foreach ($row as $data) {
            
            $countheader= count($header);
            $data = Excel::load($filepath, function($reader) {
            })->get();

         if($countheader<7  && in_array('kejuruan',$header) && in_array('program_pelatihan',$header) && in_array('sumber_dana',$header)&& in_array('durasi',$header)&& in_array('paket',$header)&& in_array('orang',$header)){
            $countheader= count($header); 
            if(!empty($data) && $data->count()){
                foreach ($data as $key => $value) {
                    $insert[] = ['kejuruan' => $value->kejuruan, 
                                 'program_pelatihan' => $value->program_pelatihan,
                                 'sumber_dana' => $value->sumber_dana,
                                 'durasi' => $value->durasi,
                                 'paket' => $value->paket,
                                 'orang' => $value->orang,
                                 'users_id' => $users_id
                                ];
                }
                if(!empty($insert)){
                    \DB::table('renlakgiats')->insert($insert);
                    Session::flash('message', 'Success Uploading Csv file'); 
                    Session::flash('alert-class', 'alert-success');
                }
            }
        }
        else {
                    Session::flash('message', 'Failed Upload file Csv, Please Check your csv file format!'); 
                    Session::flash('alert-class', 'alert-danger');
        }
            return redirect()->route('admin.profile');
    }

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

    public function laporanRenlakgiat($id){
        $renlakgiat = Renlakgiat::where('id','=',$id)->get();
        $laporan = laporan::where('renlakgiat_id',$id)->get();
        return view('renlakgiat.detailLaporan', compact('laporan','renlakgiat'));
    }

    public function editTanggal($id){
        $renlakgiat = Renlakgiat::where('id','=',$id)->get();
        return view('renlakgiat.editTanggal', compact('renlakgiat'));
    }

    public function updateTanggal(Request $request, $id)
    {
        $renlakgiat = Renlakgiat::find($id);
        $newtgl_mulai = $request->newtgl_mulai;
        $newtgl_selesai = $request->newtgl_selesai;
        $tgl_mulai = $request->tgl_mulai;
        $tgl_selesai = $request->tgl_selesai;
        $alasan = $request->alasan;
        $now = Carbon::now();
        $renlakgiat->tgl_mulai = $request->newtgl_mulai;
        $renlakgiat->tgl_selesai = $request->newtgl_selesai;
        $renlakgiat->histori_perubahan = "Perubahan tanggal rencana perencanaan kegiatan yang awalnya dimulai pada tanggal ".''.$tgl_mulai.''." sampai dengan tanggal ".''.$tgl_selesai.''." menjadi dimulai pada tanggal ".''.$newtgl_mulai.''." sampai dengan ".''.$newtgl_selesai.''." karena alasan ".''.$alasan.''.", . Perubahan ini dilakukan pada tanggal ".''.$now;
        $renlakgiat->save();
        return redirect()->route('admin.renlakgiat');
    }
}