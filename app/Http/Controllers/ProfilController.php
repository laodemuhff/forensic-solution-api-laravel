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

    public function showChangePasswordForm(){
      return view('admin.profil.changepassword');
    }
       
    public function changePassword(Request $request){
      if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
          // The passwords matches
          return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
      }
      if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
          //Current password and new password are same
          return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
      }
      $validatedData = $request->validate([
          'current-password' => 'required',
          'new-password' => 'required|string|min:6|confirmed',
      ]);
      //Change Password
      $user = Auth::user();
      $user->password = bcrypt($request->get('new-password'));
      $user->save();
      return redirect()->back()->with("success","Password changed successfully !");
  }
}
