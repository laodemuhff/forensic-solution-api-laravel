<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\History;
use App\User;
use App\Aturan;
use Session;
use Auth;

class HistoryController extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexall()
    {
        $histories = history::all();
        return view('admin.histories.index')->withHistories($histories);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $histories = history::where('id_user', Auth::user()->id)->get();
        return view('admin.histories.index')->withHistories($histories);
    }
}
