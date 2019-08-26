<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profil;
use Session;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class ProfilController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $profils = Profil::find($id);
        return view('admin.profil.index')->withProfils($profils);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profil = Profil::find($id);
        return view('admin.profil.edit')->withProfil($profil);
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
        $profil = Profil::find($id);

        $this->validate($request, ['name' => 'required|max:255']);

        $profil->name = $request->name;
        $profil->email = $request->email;
        $profil->save();

        Session::flash('success', 'Successfully saved your new profil!');

        return redirect()->route('profil.index');
    }
}
