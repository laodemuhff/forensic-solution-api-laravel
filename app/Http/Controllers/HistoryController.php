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
use Illuminate\Support\Facades\DB;

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
        return view('admin.histories.indexall')->withHistories($histories);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_user = Auth::user()->id;
        $histories = DB::table('history')
        ->select('*')
        ->where('id_user', $id_user)
        ->get();
        return view('admin.histories.index')->withHistories($histories);
    }

    public function store(Request $request)
    {
        $history = new history;
        $history->id_user = $request->id_user;
        $history->id_aturan = $request->id_aturan;
        $history->save();

        Session::flash('success', 'New History was successfully created!');

        return redirect()->route('history');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_aturan)
    {
        $idaturan = $id_aturan;
        return view('admin.histories.show')->withIdaturan($idaturan);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $history = history::find($id);

        $history->delete();

        Session::flash('success', 'History was successfully deleted.');

        return redirect()->route('histories.index');
    }
}
