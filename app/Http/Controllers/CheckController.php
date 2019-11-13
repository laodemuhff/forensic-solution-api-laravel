<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Check;
use App\Fung;
use App\Char;
use App\Aturan;
use App\App;
use DB;
use Session;
use Storage;


class CheckController extends Controller
{
	public function __construct()
	{
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
	public function next(Request $request)
	{
		$id_fungsionalitas = $request->id_fungsionalitas;
		$app_fung = DB::table('app_fung')->where('fung_id_fungsionalitas', $id_fungsionalitas)->get()->pluck('app_id_aplikasi');
		$aturans = Aturan::find($app_fung);
		$arrayinput = $request->karakteristik;

		return view('admin.checktools.next')->withAturans($aturans)->withArrayinput($arrayinput);
	}

}
