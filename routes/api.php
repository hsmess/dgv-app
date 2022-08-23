<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/tournaments/{tournament}/round','Api\TournamentController@roundCompleted');
Route::get('/tournaments/{tournament}/{status}','Api\TournamentController@updateStatus');


Route::post('/unfavourite-media/{media}','Api\MediaController@unfavourite');
Route::post('/favourite-media/{media}','Api\MediaController@favourite');
Route::post('/ufa','Api\MediaController@ufa');
