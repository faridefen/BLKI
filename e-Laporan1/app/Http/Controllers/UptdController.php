<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Renlakgiat;
use Auth;
class UptdController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function indexRenlakgiat(){
    	$renlakgiat = Renlakgiat::where('users_id','=',Auth::user()->id)->get();
    	return view('user.indexRenlakgiat', compact('renlakgiat'));
    }
}
