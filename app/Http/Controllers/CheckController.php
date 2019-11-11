<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Check;
use App\Fung;
use App\Char;
use App\Aturan;
use Session;
use Storage;


class CheckController extends Controller
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
        $fungs = Fung::all();
        //return a view and pass in the above variable
        return view('admin.checktools.index')->withFungs($fungs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function next()
    {
        $chars = Char::all();
      $chars2 = array();
      foreach ($chars as $char) {
        $chars2[$char->id_karakteristik] = $char->jenis_karakteristik.' - '.$char->nama_karakteristik;
      }
      $aturans = Aturan::all();
        return view('admin.checktools.next')->withChars($chars2)->withAturans($aturans);
    }

}
