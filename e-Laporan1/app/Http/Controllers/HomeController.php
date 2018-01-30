<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Renlakgiat;
use Lava;
use Charts;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
                $data->nama_lembaga = Charts::create('pie', 'highcharts')
                    ->title($data->nama_lembaga)
                    ->labels(['Belum Berjalan', 'sudah Berjalan', 'Selesai'])
                    ->values([count($belum),count($sedang),count($telah)])
                    ->dimensions(1000,500)
                    ->responsive(false)
                    ->credits(false);
        }
        return view( 'home', compact('user') , ['chart' => $data->nama_lembaga] );
    }
}
