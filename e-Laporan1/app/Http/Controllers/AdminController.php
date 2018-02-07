<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Renlakgiat;
use App\Pktp;
use App\Dokumen;
use Lava;
use Charts;
use Notification;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = Profile::all();
        foreach ($user as $data) {
            $userid = $data->users_id;
             $belum = Renlakgiat::where('users_id',$userid)->where('status', 'Belum Berjalan')->get();
             $sedang = Renlakgiat::where('users_id',$userid)->where('status', 'Sedang Berjalan')->get();
             $telah = Renlakgiat::where('users_id',$userid)->where('status', 'Sudah Selesai')->get();
             $null = Renlakgiat::where('users_id',$userid)->where('status', (NULL))->get();
             $data->nama_lembaga = Charts::create('donut', 'highcharts')
                    ->title($data->nama_lembaga)
                    ->labels(['Belum Berjalan', 'Sedang Berjalan', 'Sudah Selesai','Belum Direncanakan'])
                    ->values([count($belum),count($sedang),count($telah),count($null)])
                    ->dimensions(1000,500)
                    ->responsive(false)
                    ->credits(false);
        }

        return view('admin', compact('user'), ['chart' => $data->nama_lembaga]);
    }
    
    public function Renlakgiatdata(){
        $renlakgiat = Renlakgiat::all();
        return view(compact('renlakgiat'));
    }

    public function indexProfile(){
        $profile = Profile::paginate(5);
        return view('admin.indexProfile', compact('profile','notif','renlakgiat'));
    }

    public function detailProfile($id){
        
        $profile = Profile::where('id','=',$id)->get();
        return view('admin.detailProfile', compact('profile','notif'));
    }

    public function indexUser(){
        
        $user = User::all();
        return view('admin.indexUser', compact('user','notif','passEncrypt'));
    }

    public function formAddUser(){
        
        return view('admin.add-user', compact('notif'));
    }

    public function addUser(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('admin.user');
    }

    public function hapusUser($id){
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.user');
    }

    public function editUser($id){
        
        $user = User::where('id','=',$id)->get();
        return view('admin.editUser', compact('user','notif'));
    }

    public function updateUser($id, Request $request){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('admin.user');
    }
    public function indexPktp($id){
        $renlakgiat = Renlakgiat::where('id',$id)->get();
        $pktp = Pktp::where('renlakgiat_id',$id)->orderBy('nama','asc')->paginate(5);
        return view('admin.indexpktp', compact('pktp'), compact('renlakgiat'));
    }
}
