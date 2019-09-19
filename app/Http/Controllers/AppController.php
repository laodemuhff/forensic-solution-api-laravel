<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\App;
use App\Fung;
use Session;

class AppController extends Controller
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
        $apps = App::all();
        return view('admin.tools.index')->withApps($apps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $fungs = Fung::all();
      $fungs2 = array();
      foreach ($fungs as $fung) {
        $fungs2[$fung->id_fungsionalitas] = $fung->nama_fungsionalitas;
      }
        return view('admin.tools.create')->withFungs($fungs2);
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
            'nama_aplikasi' => 'required|max:255'
          ));
  
        // store in the database
        $app = new App;
  
        $app->nama_aplikasi = $request->nama_aplikasi;
        $app->keterangan = $request->keterangan;
  
        $app->save();
  
        
        if (isset($request->fungs)) {
          $app->fungs()->sync($request->fungs);
      }else {
        $app->fungs()->sync(array());
      }
  
        Session::flash('success', 'New tool was successfully created!');
  
        return redirect()->route('tools.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_aplikasi)
    {
        $app = App::find($id_aplikasi);
        return view('admin.tools.show')->withApp($app);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_aplikasi)
    {

         // find the aturan in the database and save that as a variable
         $app = App::find($id_aplikasi);
 
         $fungs = Fung::all();
         $fungs2 = array();
         foreach ($fungs as $fung) {
           $fungs2[$fung->id_fungsionalitas] = $fung->nama_fungsionalitas;
         }
         //return the view and pass in the variablie we previously created
         return view('admin.tools.edit')->withApp($app)->withFungs($fungs2);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_aplikasi)
    {
        $app = App::find($id_aplikasi);

        $this->validate($request, ['nama_aplikasi' => 'required|max:255']);

        $app->nama_aplikasi = $request->nama_aplikasi;
        $app->keterangan = $request->keterangan;
        $app->save();

        
        if (isset($request->fungs)) {
            $app->fungs()->sync($request->fungs);
        }else {
          $app->fungs()->sync(array());
        }

        // set flash data with success message
        Session::flash('success', 'This tool was successfully saved.');
        // redirect with flash data to aturan.show
        return redirect()->route('tools.show', $app->id_aplikasi);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_aplikasi)
    {
        $app = App::find($id_aplikasi);
        $app->fungs()->detach();

        $app->delete();

        Session::flash('success', 'Tool was successfully deleted.');

        return redirect()->route('tools.index');
    }
}
