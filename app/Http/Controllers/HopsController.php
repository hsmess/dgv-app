<?php

namespace App\Http\Controllers;

use App\DGVMedia;
use App\Tournament;
use App\TournamentPlayer;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use MuxPhp\Api\AssetsApi;
use MuxPhp\Configuration;
use GuzzleHttp\Client;
use MuxPhp\Models\CreateAssetRequest;
use MuxPhp\Models\InputSettings;
use MuxPhp\Models\PlaybackPolicy;

class HopsController extends Controller
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


    public function hops()
    {
        return view('hops');
    }
    public function upload(Request $request)
    {
        $files = $request->file('files');

         foreach($files as $file)
         {
             $path = Storage::disk('s3')->put('files', $file,'public');
             $url = 'https://dontshootdg.s3.eu-west-2.amazonaws.com/'.$path;

             if($this->isVideo($file))
             {
                 // Authentication Setup
                 $config = Configuration::getDefaultConfiguration()
                     ->setUsername(env('MUX_TOKEN_ID'))
                     ->setPassword(env('MUX_TOKEN_SECRET'));

                 // API Client Initialization
                 $assetsApi = new AssetsApi(
                     new Client(),
                     $config
                 );

                 // Create Asset Request
                 $input = new InputSettings(["url" => $url]);
                 $createAssetRequest = new CreateAssetRequest(["input" => $input, "playback_policy" => [PlaybackPolicy::PUBLIC_PLAYBACK_POLICY] ]);

                 // Ingest
                 $result = $assetsApi->createAsset($createAssetRequest);
                 $url =  "https://stream.mux.com/" . $result->getData()->getPlaybackIds()[0]->getId() . ".m3u8";
                 $media = new DGVMedia();
                 $media->type = 1;
                 $media->hops = true;
                 $media->url = $url;
                 $media->user_id = Auth::user()->id;
                 $media->save();
             }
             else{
                 $media = new DGVMedia();
                 $media->type = 0;
                 $media->hops = true;
                 $media->url = $url;
                 $media->user_id = Auth::user()->id;
                 $media->save();
             }
            return response()->json('success');

         }
    }

    public function april()
    {
        if(!Auth::user()->name == 'Brandon Patrick')
        {
            return redirect()->back();
        }
        $items = DGVMedia::orderBy('created_at','DESC')->where('hops',true)->with('user')->get();
        return view('april',compact('items'));
    }
    public function showMedia(DGVMedia $media)
    {
        $user = User::where('id',$media->user_id)->first();
        if($media->type == 0)
        {
            $url = $media->url;
            return view('image',compact('url','user'));
        }
        if($media->type == 1)
        {
            $url = $media->url;
            return view('video',compact('url','user'));
        }
    }

    public function isVideo($file)
    {
        $mime = $file->getMimeType();
        Log::alert($mime);
        if ($mime == "video/x-flv" || $mime == "video/mp4" || $mime == "application/x-mpegURL" || $mime == "video/MP2T" || $mime == "video/3gpp" || $mime == "video/quicktime" || $mime == "video/x-msvideo" || $mime == "video/x-ms-wmv")
        {
            return true;
        }
        else return false;

    }
}
