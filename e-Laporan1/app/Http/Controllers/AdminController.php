<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use App\Renlakgiat;
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
        
        return view('admin', compact('notif'));
    }
    
    public function Renlakgiatdata(){
        $renlakgiat = Renlakgiat::all();
        return view(compact('renlakgiat'));
    }

    public function indexProfile(){
        $profile = Profile::all();
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
}
