<?php

namespace App\Http\Controllers;

use App\Batch;
use App\DGVMedia;
use App\HofPlayer;
use Aws\Rekognition\RekognitionClient;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use MuxPhp\Api\AssetsApi;
use MuxPhp\Configuration;
use MuxPhp\Models\CreateAssetRequest;
use MuxPhp\Models\InputSettings;
use MuxPhp\Models\PlaybackPolicy;

class HoFController extends Controller
{
    public function index()
    {
        $players = HofPlayer::all()->sortBy('rating')->take(100);
        return view('hof',compact('players'));
    }
    public function create()
    {
        return view('hof_create');
    }
    public function upload(Request $request)
    {

        $file = $request->file('file');
        $path = Storage::disk('s3')->put('files', $file,'public');
        $url = 'https://dontshootdg.s3.eu-west-2.amazonaws.com/'.$path;
        $media = new DGVMedia();
        $media->type = 2;
        $media->url = $url;
        $media->user_id = Auth::user()->id;
        $media->batch_id = 0;
        $media->save();


        $client = new RekognitionClient([
            'region' => config('filesystems.disks.s3.region'),
            'version' => 'latest'
        ]);
        $esp = $client->detectText([
            'Image' => [
                'S3Object' => [
                    'Bucket' => config('filesystems.disks.s3.bucket'),
                    'Name' => $path,
                ]
            ]
        ]);
        $next_rating = false;
        $rating = 0;
        collect($esp->get('TextDetections'))->each(function ($item) use (&$next_rating,&$rating){
            if($next_rating == true)
            {
                Log::info('next was hit');
                Log::debug($item['DetectedText']);
                $rating = (int) $item['DetectedText'];
                return false;
            }
            elseif($item['DetectedText'] == "RATING:")
            {
                Log::info('found rating');
                $next_rating = true;
            }
        });
        $player = HofPlayer::where('user_id',Auth::user()->id)->first();
        if($player == null)
        {
            $player = new HofPlayer();
            $player->user_id = Auth::user()->id;
            $player->media_id = $media->id;
            $player->rating = $rating;
            $player->save();
        }
        else{
            if($rating > $player->rating)
            {
                $player->media_id = $media->id;
                $player->rating = $rating;
                $player->save();
            }
        }


        return response()->json('success');
    }
    public function profile()
    {

    }
}

//
//public function upload(Request $request)
//{
//    $files = $request->file('files');
//    $batch = Batch::where('is_hops',false)->latest()->first()->id ?? 0;
//
//    foreach($files as $file)
//    {
//        $path = Storage::disk('s3')->put('files', $file,'public');
//        $url = 'https://dontshootdg.s3.eu-west-2.amazonaws.com/'.$path;
//
//        if($this->isVideo($file))
//        {
//            // Authentication Setup
//            $config = Configuration::getDefaultConfiguration()
//                ->setUsername(env('MUX_TOKEN_ID'))
//                ->setPassword(env('MUX_TOKEN_SECRET'));
//
//            // API Client Initialization
//            $assetsApi = new AssetsApi(
//                new Client(),
//                $config
//            );
//
//            // Create Asset Request
//            $input = new InputSettings(["url" => $url]);
//            $createAssetRequest = new CreateAssetRequest(["input" => $input, "playback_policy" => [PlaybackPolicy::PUBLIC_PLAYBACK_POLICY] ]);
//
//            // Ingest
//            $result = $assetsApi->createAsset($createAssetRequest);
//            $url =  "https://stream.mux.com/" . $result->getData()->getPlaybackIds()[0]->getId() . ".m3u8";
//            $media = new DGVMedia();
//            $media->type = 1;
//            $media->url = $url;
//            $media->user_id = Auth::user()->id;
//            $media->batch_id = $batch;
//            $media->save();
//        }
//        else{
//            $media = new DGVMedia();
//            $media->type = 0;
//            $media->url = $url;
//            $media->user_id = Auth::user()->id;
//            $media->batch_id = $batch;
//            $media->save();
//        }
//        return response()->json('success');
//
//    }
//}
