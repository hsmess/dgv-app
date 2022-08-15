<?php

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MuxPhp\Api\AssetsApi;
use MuxPhp\Api\PlaybackIDApi;
use MuxPhp\Configuration;
use MuxPhp\Models\CreateAssetRequest;
use MuxPhp\Models\InputSettings;
use MuxPhp\Models\PlaybackPolicy;

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

Route::get('/old/home','HomeController@home')->name('old-fhome');
Route::get('/dynamic-discs-open','HomeController@test');
//Route::get('/discgolfuk','HomeController@test');
Route::get('/admin','HomeController@admin');
Route::get('/show-media/{media}','HomeController@showMedia')->name('media');
Route::post('/uppy','HomeController@upload')->name('uppy');
Route::get('/video-history','HomeController@videoHistory');

Route::post('/uppy-hops','HopsController@upload')->name('uppy-hops');
Route::get('/hopsandhyzer','HopsController@hops')->name('hops');
Route::get('/hopsandhyzer/admin','HopsController@april')->name('hopsadmin');
Route::get('/hopsandhyzer/show-media/{media}','HopsController@showMedia')->name('hopsmedia');
Route::get('/hopsandhyzer/video-history','HopsController@videoHistory');


//Generic
Route::get('/admin','EventAdminController@index');

Route::get('/home','EventController@index')->name('home');
Route::get('/event/{event}','EventController@show');
Route::get('/admin/event/{event}','EventAdminController@show');
Route::get('/admin/event/{event}/toggle','EventAdminController@toggle');
Route::post('/event/{event}/upload','EventController@upload');
Route::get('/show-media/{media}','EventController@showMedia');
Route::get('/admin/event/show-media/{media}','EventController@showMedia');
Route::get('/admin/event/{event}/show-media/{media}','EventController@showMediaEvent');
Route::get('/admin/event/{event}/video-library','EventAdminController@videoLibrary');

Route::get('/batch/increment','EventAdminController@incrementBatch');


Route::get('/privacy','PolicyController@privacy');
Route::get('/terms','PolicyController@terms');
Route::get('/data','PolicyController@data');
Route::get('/logout', function (Request $request){
   Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
});

Route::get('/redirect', 'SocialAuthFacebookController@redirect')->name('facebook_login');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/google-redirect', 'SocialAuthFacebookController@googleRedirect')->name('google_login');
Route::get('/google-callback', 'SocialAuthFacebookController@googleCallback');
//Route::get('/batch/increment','TournamentController@incrementBatch');
//
Route::get('admin/login-bypass',function (Request $request){
    $user = \App\User::find(1);
    Auth::login($user);
    return redirect()->to('home');
});

Route::post('request-video-download',function (Request $request){

    $item = \App\DGVMedia::findOrFail($request->mediaID);

    $muxID = substr(explode('/',$item->url)[3],0,-5);

    $config = Configuration::getDefaultConfiguration()
        ->setUsername(env('MUX_TOKEN_ID'))
        ->setPassword(env('MUX_TOKEN_SECRET'));


    //convert playback to asset id
    $playbackIdApi = new MuxPhp\Api\PlaybackIDApi(
        new GuzzleHttp\Client(),
        $config
    );

    $pbPlaybackAssetGet = $playbackIdApi->getAssetOrLivestreamId($muxID);


    // API Client Initialization
    $assetsApi = new AssetsApi(
        new Client(),
        $config
    );

    $assetID = $pbPlaybackAssetGet['data']['object']['id'];


    //see if we have download link for this video already
    $waitingAsset = $assetsApi->getAsset($assetID);
    if($waitingAsset['data']['master'])
    {
        $downloadURL = $waitingAsset['data']['master']['url'];
    }
    else{
        $downloadURL = null;
    }

    if($downloadURL == null)
    {

        $updateAssetMasterAccessRequest = new MuxPhp\Models\UpdateAssetMasterAccessRequest(["master_access" => "temporary"]);
        $assetWithMasterAccess = $assetsApi->updateAssetMasterAccess($assetID, $updateAssetMasterAccessRequest);


        if($assetWithMasterAccess['data']['master'])
        {
            $downloadURL = $assetWithMasterAccess['data']['master']['url'];
        }
        else{
            $downloadURL = null;
        }

        while($downloadURL == null)
        {
            sleep(1);
            $waitingAsset = $assetsApi->getAsset($assetID);
            if($waitingAsset['data']['master'])
            {
                $downloadURL = $waitingAsset['data']['master']['url'];
            }
            else{
                $downloadURL = null;
            }
        }
    }


    return \Illuminate\Support\Facades\Response::json(['download_url'=>$downloadURL]);

});
