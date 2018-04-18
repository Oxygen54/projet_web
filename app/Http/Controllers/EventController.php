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
        // Retrieve events from DB
        $events = Event::orderBy('created_at', 'desc')->get();

        // Return view
        return view('event', ['events' => $events]);

    }

    public function likeEvent(Request $request)
    {

        // Retrieve values
        $event_id = $request['postid'];
        $is_like = $request['isLike'] === 'true';
        $update = false;

        // Find the event in DB thanks to the ID
        $event = Event::find($event_id);

        if (!$event) {
            return null;
        }

        // Call the User class
        $user = Auth::user();
        $like = $user->subscribes()->where('postid', $event_id)->first();


        // Check the like / dislike status
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

        // Check the required values
        $this->validate($request, [
            'title_event' => 'required|max: 30',
            'event' => 'required|max:1000'
        ]);

        // Call Event class
        $event = new Event();
        $event->title = $request['title_event'];
        $event->body = $request['event'];

        // Retrieve the image
        $file = $request->file('image');
        $filename = $event->title . '.jpg';

        // Check if the image exist, if not create with the title of the event
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }

        // Check the result
        $message = 'There was an error';
        if ($request->user()->events()->save($event)) {
            $message = 'Post successfully created!';
        }

        // Return view
        return redirect()->route('event')->with(['message' => $message]);
    }

    public function DeleteEvent($event_id)
    {

        // Find the event thanks to the ID
        $event = Event::where('id', $event_id)->first();
        if (Auth::user() != $event->user) {
            return redirect()->back();
        }

        // Delete event
        $event->delete();

        // Delete the image
        Storage::disk('local')->delete($event->title . '.jpg');

        // Return view
        return redirect()->route('event')->with(['message' => 'Successfully deleted!']);
    }

    public function EditEvent(Request $request)
    {

        // Check required values
        $this->validate($request, [
            'event' => 'required|max:1000'
        ]);

        // Find the event thanks to the ID
        $event = Event::find($request['eventId']);

        // Get the image
        $file = $request->file('image');
        $filename = $event->title . '.jpg';

        // Save it
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        $event->body = $request['event'];

        // Update the event in DB
        $event->update();
        return redirect()->route('event');
    }

    public function getEventImage($filename)
    {

        // Retrieve the image
        $file = Storage::disk('local')->get($filename);
        return new Response($file, 200);
    }

}
