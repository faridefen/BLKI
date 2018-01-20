<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

        // return view('layouts.app', compact('count'));
    }

    // public function checkverifikasi(){
        // $notif = Laporan::where("status","=","Belum terverifikasi");
        // $count = count($notif);
        // return view('layouts.app', compact('count'));
    // }
}
