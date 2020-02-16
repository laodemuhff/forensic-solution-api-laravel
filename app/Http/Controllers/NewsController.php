<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\News;
use App\User;
use App\Aturan;
use Session;
use Auth;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
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
        $news = news::all();
        return view('admin.new.index')->withNews($news);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = news::find($id);

        $news->delete();

        Session::flash('success', 'Successfully deleted.');

        return redirect()->route('new.index');
    }
}
