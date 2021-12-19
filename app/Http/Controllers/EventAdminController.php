<?php

namespace App\Http\Controllers;

use App\Batch;
use App\DGVMedia;
use App\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventAdminController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('admin_dashboard',compact('events'));
    }
    public function show(Event $event)
    {
        $batch = Batch::where('event_id',$event->id)->latest()->first()->id ?? 0;

        $items = DGVMedia::orderBy('created_at','DESC')->where('event_id',$event->id)->where('batch_id',$batch)->with('user')->get();

        return view('show_event',compact('items','event'));
    }


    public function videoLibrary(Event $event)
    {
        $batch = Batch::where('event_id',$event->id)->latest()->first()->id ?? 0;

        $items = DGVMedia::orderBy('created_at','DESC')->where('event_id',$event->id)->where('batch_id','!=',$batch)->with('user')->get();
        $is_library = true;
        return view('show_event',compact('items','event','is_library'));
    }




    public function toggle(Event $event)
    {
        $event->display_on_dash = !$event->display_on_dash;
        $event->save();
        return redirect()->back();
    }

    public function incrementBatch(Request $request)
    {
        $batch = new Batch();
        $batch->event_id = $request->event_id;
        $batch->is_hops = true;
        $batch->save();
        return redirect()->back();
    }
}
