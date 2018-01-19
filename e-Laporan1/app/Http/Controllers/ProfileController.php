<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:web');
    }

    public function index()
    {
        $profile = Profile::where('users_id','=',Auth::user()->id)->get();
        return view('profile.index', compact('profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            if($request->hasFile('foto_pimpinan') && $request->hasFile('foto_gedung')){
                $request->file('foto_pimpinan')->move('upload', $request->foto_pimpinan->getClientOriginalName());
                $request->file('foto_gedung')->move('upload', $request->foto_gedung->getClientOriginalName());

                
            }
                
                $profile = new Profile;
                $data = $request->all();
                $profile->save($data);
                return redirect()->route('profile');
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
        $profile = Profile::where('id','=',Auth::user()->id)->get();
        return view('profile.edit', compact('profile'));
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
        $profile = Profile::find($id);
        if($request->hasFile('foto_pimpinan') && $request->hasFile('foto_gedung')){
                $request->file('foto_pimpinan')->move('upload', $request->foto_pimpinan->getClientOriginalName());
                $request->file('foto_gedung')->move('upload', $request->foto_gedung->getClientOriginalName());
        }elseif ($request->hasFile('foto_pimpinan')) {
             $request->file('foto_pimpinan')->move('upload', $request->foto_pimpinan->getClientOriginalName());
        }elseif ($request->hasFile('foto_gedung')) {
            $request->file('foto_gedung')->move('upload', $request->foto_gedung->getClientOriginalName());
        }
        $data = $request->all();
        $profile->save($data);
        return redirect()->route('profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
