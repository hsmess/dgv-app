<?php

namespace App\Http\Controllers\Api;

use App\DGVMedia;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class MediaController extends Controller
{
    public function favourite(DGVMedia $media)
    {
        $media->favourite = true;
        $media->save();
        return true;
    }
    public function unfavourite(DGVMedia $media)
    {
        $media->favourite = false;
        $media->save();
        return true;
    }
    public function ufa()
    {
        DGVMedia::where('favourite',true)->update(['favourite' => false]);
        return true;
    }
}
