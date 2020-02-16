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
   Route::resource('admin/tools', 'AppController')->middleware('admin');
   // Karakteristik
   Route::resource('admin/chars', 'CharController', ['except' => ['create']])->middleware('admin');
   // Fungsionalitas
   Route::resource('admin/funcs', 'FungController', ['except' => ['create']])->middleware('admin');
   //Aturan
   Route::resource('admin/rules', 'AturanController')->middleware('admin');
   //History
   Route::get('admin/allhistories', 'HistoryController@indexall')->middleware('admin');
   //New
   Route::resource('admin/new', 'NewsController', ['only' => ['index', 'destroy']])->middleware('admin');

   
   //Profil
   Route::resource('admin/profil', 'ProfilController');
   
  Route::get('admin/profil/{id}/changepassword','ProfilController@showChangePasswordForm')->name('formpassword');
  Route::post('admin/profil/savepassword','ProfilController@changePassword')->name('savepassword');
   
   //History
   Route::resource('admin/histories', 'HistoryController', ['only' => ['index', 'show', 'destroy']]);
   //Route::get('admin/histories', 'HistoryController@index')->name('history');
   //Route::get('admin/histories/{id}', 'HistoryController@show')->name('history.show');

   
   //CheckTools
   Route::get('admin/checktools', 'CheckController@index');
   Route::post('admin/checktools/next', 'CheckController@next')->name('next');
   
   Route::post('admin/checktools/save', 'HistoryController@store');

   
    
  });