<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\App;
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
        return view('admin.apps.index')->withApps($apps);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array('nama_aplikasi' => 'required|max:255'));
        $app = new App;
        $app->nama_aplikasi = $request->nama_aplikasi;
        $app->keterangan = $request->keterangan;
        $app->save();

        Session::flash('success', 'New App was successfully created!');

        return redirect()->route('apps.index');
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
        return view('admin.apps.show')->withApp($app);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_aplikasi)
    {
        $app = App::find($id_aplikasi);
        return view('admin.apps.edit')->withApp($app);
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

        Session::flash('success', 'Successfully saved your new app!');

        return redirect()->route('apps.index', $app->id_aplikasi);
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

        $app->delete();

        Session::flash('success', 'App was deleted successfully');

        return redirect()->route('apps.index');
    }
}
