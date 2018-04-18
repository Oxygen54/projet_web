<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Subscribe;
use App\Event;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function event()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        return view('event', ['events' => $events]);

    }

    public function likeEvent(Request $request)
    {
        $event_id = $request['postid'];
        $is_like = $request['isLike'] === 'true';
        $update = false;

        $event = Event::find($event_id);

        if (!$event) {
            return null;
        }

        $user = Auth::user();
        $like = $user->subscribes()->where('postid', $event_id)->first();

        if ($like) {
            $already_like = $like->like;
            $update = true;
            if ($already_like == $is_like) {
                $like->delete();
                return null;
            }
        } else {
            $like = new Subscribe();
        }

        $like->like = $is_like;
        $like->user_id = $user->id;
        $like->event_id = $event->id;

        if ($update) {
            $like->update();
        } else {
            $like->save();
        }

        return null;
    }

    public function CreateEvent(Request $request)
    {

        $this->authorize('create', $request);

        $this->validate($request, [
            'title_event' => 'required|max: 30',
            'event' => 'required|max:1000'
        ]);
        $event = new Event();
        $event->title = $request['title_event'];
        $event->body = $request['event'];


        $file = $request->file('image');
        $filename = $event->title . '.jpg';

        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }

        $message = 'There was an error';
        if ($request->user()->events()->save($event)) {
            $message = 'Post successfully created!';
        }
        return redirect()->route('event')->with(['message' => $message]);
    }

    public function DeleteEvent($event_id)
    {

        $this->authorize('delete', $event_id);


        $event = Event::where('id', $event_id)->first();
        if (Auth::user() != $event->user) {
            return redirect()->back();
        }
        $event->delete();
        Storage::disk('local')->delete($event->title . '.jpg');
        return redirect()->route('event')->with(['message' => 'Successfully deleted!']);
    }

    public function EditEvent(Request $request)
    {

        $this->authorize('update', $request);



        $this->validate($request, [
            'event' => 'required|max:1000'
        ]);
        $event = Event::find($request['postid']);
        if (Auth::user() != $event->user) {
            return redirect()->back();
        }
        $event->body = $request['event'];
        $event->update();
        return response()->json(['new_body' => $event->body], 200);
    }

    public function getEventImage($filename)
    {
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }

}
