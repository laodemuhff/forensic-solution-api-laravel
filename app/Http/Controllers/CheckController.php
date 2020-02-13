<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Check;
use App\Fung;
use App\History;
use App\News;
use App\Char;
use App\Aturan;
use App\App;
use DB;
use Auth;
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
		$idfungsionalitas = $request->id_fungsionalitas;
		$arrayinput = $request->karakteristik;
		$iduser = Auth::user()->id;

		$idaplikasi = DB::table('app_fung')->where('fung_id_fungsionalitas', $idfungsionalitas)->get()->pluck('app_id_aplikasi');
		foreach ($idaplikasi as $iapp) {
			$idaturan = DB::table('aturan')->where('id_aplikasi', $iapp)->get()->pluck('id_aturan');
			$idaturanall[] = $idaturan->all();
		}
		foreach ($idaturanall as $row => $innerArray) {
			foreach ($innerArray as $innerRow => $value) {
				$idaturanchar = DB::table('aturan_char')->where('aturan_id_aturan', $value)->get()->pluck('char_id_karakteristik');
				$idaturancharall[] = $idaturanchar->all();
				$valueall[] = $value;
			}
		}

		$k = false;
		$hasilll = [];
		$arrayfilter = array_filter($arrayinput);
		$arrayreindex = array_values($arrayfilter);
		for ($i = 0; $i < count($idaturancharall); $i++) {
			$kar = ($idaturancharall[$i] == $arrayreindex);
			if ($kar) {
				$k = true;
				$hasilll[] = $valueall[$i];

				$history = new history;
				$history->id_user = $iduser;
				$history->id_aturan = $valueall[$i];
				$history->save();
				Session::flash('success', 'Data Added to History!');
			}
		}
		if($k === false){
			$hasilll[] = 0;
			foreach($arrayinput as $ray => $value){     
				$namachar = DB::table('chars')->where('id_karakteristik', $value)->value('nama_karakteristik');
				$jenischar = DB::table('chars')->where('id_karakteristik', $value)->value('jenis_karakteristik');
				$gabungan[ ]= $jenischar . ' ' . $namachar;
			}
			$karakteristik = implode( ', ', $gabungan );
			
			$new = new news;
			$new->id_user = Auth::user()->id;
			$new->karakteristik = $karakteristik;
			$new->save();
		}

		return view('admin.checktools.next')->withIdfungsionalitas($idfungsionalitas)->withArrayinput($arrayinput)->withIduser($iduser)->withHasil($hasilll);
	}
}
