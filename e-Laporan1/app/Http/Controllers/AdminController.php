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
}
