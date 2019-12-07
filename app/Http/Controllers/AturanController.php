<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Aturan;
use App\Char;
use App\App;
use Session;
use Purifier;
use Image;
use Storage;


class AturanController extends Controller
{
  public function __construct() {
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // create a variable and store all the blog aturan in it from the database
        $aturans = Aturan::all();
        //return a view and pass in the above variable
        return view('admin.rules.index')->withAturans($aturans);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $apps = App::all();
      $chars = Char::all();
      $chars2 = array();
      foreach ($chars as $char) {
        $chars2[$char->id_karakteristik] = $char->jenis_karakteristik.' - '.$char->nama_karakteristik;
      }
        return view('admin.rules.create')->withApps($apps)->withChars($chars2);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  validate the data
        $this->validate($request, array(
          'nama_aturan' => 'required|max:255',
          'id_aplikasi' => 'required|integer',
        ));

      // store in the database
      $aturan = new Aturan;

      $aturan->nama_aturan = $request->nama_aturan;
      $aturan->id_aplikasi = $request->id_aplikasi;

      $aturan->save();

      
      if (isset($request->chars)) {
        $aturan->chars()->sync($request->chars);
    }else {
      $aturan->chars()->sync(array());
    }



      Session::flash('success', 'New rule was successfully created!');

      return redirect()->route('rules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_aturan)
    {
        $aturan = Aturan::find($id_aturan);
        return view('admin.rules.show')->withAturan($aturan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_aturan)
    {
        // find the aturan in the database and save that as a variable
        $aturan = Aturan::find($id_aturan);
        $apps = App::all();
        $cats = array();
        foreach ($apps as $app) {
          $cats[$app->id_aplikasi] = $app->nama_aplikasi;
        }

        $chars = Char::all();
        $chars2 = array();
        foreach ($chars as $char) {
          $chars2[$char->id_karakteristik] = $char->jenis_karakteristik.' - '.$char->nama_karakteristik;
        }
        //return the view and pass in the variablie we previously created
        return view('admin.rules.edit')->withAturan($aturan)->withApps($cats)->withChars($chars2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_aturan)
    {
        // Validate the data before we use it
        $aturan = Aturan::find($id_aturan);

        $this->validate($request, array(
          'nama_aturan' => 'required|max:255',
          'id_aplikasi' => 'required|integer',
        ));

        // Save the data to the SQLiteDatabase
        $aturan = Aturan::find($id_aturan);

        $aturan->nama_aturan = $request->input('nama_aturan');
        $aturan->id_aplikasi = $request->input('id_aplikasi');

        $aturan->save();

        if (isset($request->chars)) {
            $aturan->chars()->sync($request->chars);
        }else {
          $aturan->chars()->sync(array());
        }



        // set flash data with success message
        Session::flash('success', 'This rule was successfully saved.');
        // redirect with flash data to rules.show
        return redirect()->route('rules.show', $aturan->id_aturan);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_aturan)
    {
        $aturan = Aturan::find($id_aturan);
        $aturan->chars()->detach();

        $aturan->delete();

        Session::flash('success', 'The rule was successfully deleted.');
        return redirect()->route('rules.index');
    }
}
