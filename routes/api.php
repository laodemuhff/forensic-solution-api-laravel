<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');
Route::post('/check-tools', 'Api\CheckToolsController@checkTools')->middleware('auth:api');

Route::get('/histories', 'Api\HistoryController@index')->middleware('auth:api');
Route::get('/history/{id}', 'Api\HistoryController@detail')->middleware('auth:api');
Route::get('/history/delete/{id}', 'Api\HistoryController@delete')->middleware('auth:api');

Route::get('/profile', 'Api\ProfilController@index')->middleware('auth:api');
Route::post('/profile/update', 'Api\ProfilController@update')->middleware('auth:api');
Route::post('/profile/update-password', 'Api\ProfilController@updatePassword')->middleware('auth:api');
Route::get('/recommended-tools', 'Api\ProfilController@recommendedTools')->middleware('auth:api');

Route::post('/check-tools', 'Api\CheckToolsController@checkTools')->middleware('auth:api');
Route::get('/recommendation-tools', 'Api\CheckToolsController@getRecommendationTools')->middleware('auth:api');