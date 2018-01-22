<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
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
        $notif = \DB::table('laporans')->where("status","=","Belum terverifikasi")->count();
        return view('admin', compact('notif'));
    }

    public function indexProfile(){
        $notif = \DB::table('laporans')->where("status","=","Belum terverifikasi")->count();
        $profile = Profile::all();
        return view('admin.indexProfile', compact('profile','notif'));
    }

    public function detailProfile($id){
        $notif = \DB::table('laporans')->where("status","=","Belum terverifikasi")->count();
        $profile = Profile::where('id','=',$id)->get();
        return view('admin.detailProfile', compact('profile','notif'));
    }

    public function indexUser(){
        $notif = \DB::table('laporans')->where("status","=","Belum terverifikasi")->count();
        $user = User::all();
        return view('admin.indexUser', compact('user','notif','passEncrypt'));
    }

    public function formAddUser(){
        $notif = \DB::table('laporans')->where("status","=","Belum terverifikasi")->count();
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
        $notif = \DB::table('laporans')->where("status","=","Belum terverifikasi")->count();
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
}
