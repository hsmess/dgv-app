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

Route::get('/home','HomeController@home')->name('home');
Route::get('/discgolfuk','HomeController@test');
Route::get('/admin','HomeController@admin');
Route::get('/show-media/{media}','HomeController@showMedia')->name('media');
Route::post('/uppy','HomeController@upload')->name('uppy');
Route::get('/video-history','HomeController@videoHistory');

Route::post('/uppy-hops','HopsController@upload')->name('uppy-hops');
Route::get('/hopsandhyzer','HopsController@hops')->name('hops');
Route::get('/hopsandhyzer/admin','HopsController@april')->name('hopsadmin');
Route::get('/hopsandhyzer/show-media/{media}','HopsController@showMedia')->name('hopsmedia');
Route::get('/hopsandhyzer/video-history','HopsController@videoHistory');
//Route::get('/logout','AuthController@logout')->name('logout');
//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/redirect', 'SocialAuthFacebookController@redirect')->name('facebook_login');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/batch/increment','TournamentController@incrementBatch');
//
Route::group(['middleware'=>['auth']],function (){
    Route::get('/tournaments','TournamentController@index');
    Route::get('/tournaments/create','TournamentController@create');
    Route::post('/tournaments/create','TournamentController@store');
    Route::get('/tournaments/{tournament}/play','TournamentController@playerDashboard');
    Route::get('/tournaments/{tournament}/admin','TournamentController@adminDashboard');
//    Route::get('/tournaments/{tournament}/stream','TournamentController@streamerDashboard');
    Route::post('/tournaments/{tournament}/register','TournamentController@register');
    Route::get('/tournaments/{tournament}/register','TournamentController@showRegistration');
});
