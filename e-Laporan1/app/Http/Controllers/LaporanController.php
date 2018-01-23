<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index(){
		 return view('/laporan/indexlaporan');
	}
	public function detail(){
		 return view('/laporan/detaillaporan');
	}

}

