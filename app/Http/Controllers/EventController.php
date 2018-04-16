<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Subscribe;
use App\Event;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class EventController extends Controller
{
    public function event()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        return view('event', ['events' => $events]);

    }

    public function Subscribes(Request $request)
    {
        $event_id = $request['eventId'];
        $is_subscribe = $request['iSubscribe'] === 'true';
        $update = false;

        $event = Event::find($event_id);

        if (!$event) {
            return null;
        }

        $user = Auth::user();
        $subscribe = $user->events()->where('event_id', $event_id)->first();

        if ($subscribe) {
            $already_subscribed = $subscribe->subscribe;
            $update = true;
            if ($already_subscribed == $is_subscribe) {
                $subscribe->delete();
                return null;
            }
        } else {
            $subscribe = new Subscribe();
        }

        $subscribe->subscribe = $is_subscribe;
        $subscribe->user_id = $user->id;
        $subscribe->event_id = $event->id;

        if ($update) {
            $subscribe->update();
        } else {
            $subscribe->save();
        }

        return null;
    }

    public function CreateEvent(Request $request)
    {
        $this->validate($request, [
            'title_event' => 'required|max: 30',
            'event' => 'required|max:1000'
        ]);
        $event = new Post();
        $event->title = $request['title_event'];
        $event->body = $request['event'];
        $message = 'There was an error';
        if ($request->user()->events()->save($event)) {
            $message = 'Post successfully created!';
        }
        return redirect()->route('event')->with(['message' => $message]);
    }

    public function DeleteEvent($event_id)
    {
        $event = Event::where('id', $event_id)->first();
        if (Auth::user() != $event->user) {
            return redirect()->back();
        }
        $event->delete();
        return redirect()->route('event')->with(['message' => 'Successfully deleted!']);
    }

    public function EditEvent(Request $request)
    {
        $this->validate($request, [
            'event' => 'required',
            'title_event' => 'required'
        ]);
        $event = Event::find($request['eventId']);
        if (Auth::user() != $event->user) {
            return redirect()->back();
        }
        $event->body = $request['event'];
        $event->title = $request['title_event'];
        $event->update();
        return response()->json(['new_body' => $event->body], 200);
    }

}
