<?php

use Illuminate\Support\Facades\Route;

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


//Auth::routes();
Route::get('','SocialAuthFacebookController@login')->name('login');

Route::get('/home','HomeController@test')->name('home');
Route::get('/april-livestream','HomeController@april')->name('home');
Route::get('/show-media/{media}','HomeController@showMedia')->name('media');
Route::post('/uppy','HomeController@upload')->name('uppy');

//
//Route::get('/logout','AuthController@logout')->name('logout');
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/redirect', 'SocialAuthFacebookController@redirect')->name('facebook_login');
Route::get('/callback', 'SocialAuthFacebookController@callback');
//
//Route::group(['middleware'=>['auth']],function (){
//    Route::get('/tournaments/{tournament}/register','TournamentController@showRegister');
//    Route::get('/tournaments/{tournament}','TournamentController@playerDashboard');
//    Route::get('/tournaments/{tournament}/spectate','TournamentController@spectatorDashboard');
//    Route::get('/tournaments/{tournament}/admin','TournamentController@adminDashboard');
//    Route::get('/tournaments/{tournament}/stream','TournamentController@streamerDashboard');
//    Route::post('/tournaments/{tournament}/register','TournamentController@register');
//});
