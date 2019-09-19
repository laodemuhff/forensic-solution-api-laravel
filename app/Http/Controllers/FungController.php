<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fung;
use Session;

class FungController extends Controller
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
        $fungs = Fung::all();
        return view('admin.funcs.index')->withFungs($fungs);
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
        $this->validate($request, array('nama_fungsionalitas' => 'required|max:255'));
        $fung = new Fung;
        $fung->nama_fungsionalitas = $request->nama_fungsionalitas;
        $fung->save();

        Session::flash('success', 'New functionality was successfully created!');

        return redirect()->route('funcs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_fungsionalitas)
    {
        $fung = Fung::find($id_fungsionalitas);
        return view('admin.funcs.show')->withFung($fung);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_fungsionalitas)
    {
        $fung = Fung::find($id_fungsionalitas);
        return view('admin.funcs.edit')->withFung($fung);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_fungsionalitas)
    {
        $fung = Fung::find($id_fungsionalitas);

        $this->validate($request, ['nama_fungsionalitas' => 'required|max:255']);

        $fung->nama_fungsionalitas = $request->nama_fungsionalitas;
        $fung->save();

        Session::flash('success', 'This functionality was successfully saved.');

        return redirect()->route('funcs.index', $fung->id_fungsionalitas);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_fungsionalitas)
    {
        $fung = Fung::find($id_fungsionalitas);

        $fung->delete();

        Session::flash('success', 'Functionality was successfully deleted.');

        return redirect()->route('funcs.index');
    }
}
