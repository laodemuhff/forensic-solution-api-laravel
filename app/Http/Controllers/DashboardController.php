<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aturan;
use App\Char;
use App\App;
use App\Fung;
use App\History;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {   
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $apps = App::all()->count();
        $aturans = Aturan::all()->count();
        $fungs = Fung::all()->count();
        $chars = Char::all()->count();
        $histories = history::orderBy('created_at', 'DESC')->take(5)->get();
        return view('admin.dashboard')->withChars($chars)->withFungs($fungs)->withAturans($aturans)->withApps($apps)->withHistories($histories);
    }
}
