<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['middleware' => ['web']], function () {

    //Front
    Route::get('/', 'PagesController@getIndex')->name('home');
    Route::get('GetStarted', 'PagesController@getStarted');
    Route::get('About', 'PagesController@getAbout');
    
    Auth::routes();
    
  // Authentication Routes...
  Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'Auth\LoginController@login');
  Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

  //Dashboard Admin
  Route::get('/admin', 'DashboardController@index')->name('dashboard');

    
    
   // Users
   Route::resource('admin/users', 'UserController')->middleware('admin');
   // Aplikasi
   Route::resource('admin/apps', 'AppController', ['except' => ['create']])->middleware('admin');
   // Karakteristik
   Route::resource('admin/chars', 'CharController', ['except' => ['create']])->middleware('admin');
   //Aturan
   Route::resource('admin/aturan', 'AturanController')->middleware('admin');
   //History
   Route::get('admin/allhistories', 'HistoryController@indexall')->middleware('admin');

   
   //Profil
   Route::resource('admin/profil', 'ProfilController');
   
   //History
   Route::resource('admin/histories', 'HistoryController');
    
  });