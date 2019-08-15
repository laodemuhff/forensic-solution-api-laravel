<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Char;
use Session;

class CharController extends Controller
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
        $chars = Char::all();
        return view('admin.chars.index')->withChars($chars);
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
        $this->validate($request, array('nama_karakteristik' => 'required|max:255', 'jenis_karakteristik' => 'required|max:255'));
        $char = new Char;
        $char->nama_karakteristik = $request->nama_karakteristik;
        $char->jenis_karakteristik = $request->jenis_karakteristik;
        $char->save();

        Session::flash('success', 'New Char was successfully created!');

        return redirect()->route('chars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_karakteristik)
    {
        $char = Char::find($id_karakteristik);
        return view('admin.chars.show')->withChar($char);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_karakteristik)
    {
        $char = Char::find($id_karakteristik);
        return view('admin.chars.edit')->withChar($char);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_karakteristik)
    {
        $char = Char::find($id_karakteristik);

        $this->validate($request, ['nama_karakteristik' => 'required|max:255','jenis_karakteristik' => 'required|max:255']);

        $char->nama_karakteristik = $request->nama_karakteristik;
        $char->jenis_karakteristik = $request->jenis_karakteristik;
        $char->save();

        Session::flash('success', 'Successfully saved your new char!');

        return redirect()->route('chars.index', $char->id_karakteristik);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_karakteristik)
    {
        $char = Char::find($id_karakteristik);

        $char->delete();

        Session::flash('success', 'Char was deleted successfully');

        return redirect()->route('chars.index');
    }
}
