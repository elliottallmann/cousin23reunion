<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends BaseController
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        if(!Auth::check()) return;
    }

    public function underConstruction()
    {
        return view('tmp/underConstruction');
    }

    public function index()
    {
        $events = Event::all()->where("visible", true);
        return view("event.index", ["events" => $events]);
    }

    public function add(Request $request)
    {

        $name = $request->input("name");
        $location = $request->input("location");
        $description = $request->input("description");
        $link = $request->input("link");
        $date = $request->input("date");
        $author_id = Auth::id();

        $event  = new Event;
        $event->name = $name;
        $event->location = $location;
        $event->description = $description;
        $event->link = $link;
        $event->date = (\DateTime) $date;
        $event->authorId = $author_id;
        $event->visible = true;
        $event->createdAt = \Carbon\Carbon::now()->toDateTimeString();
        $event->updatedAt = \Carbon\Carbon::now()->toDateTimeString();

        $event->save();
    }

    public function delete(Request $request)
    {
        $eventId = $request->input("event_id");

        if(Auth::user()->isAdmin())
        {
            $event = Event::find($eventId);
            if($event)
            {
                $event->visible = false;
                $event->updatedAt = \Carbon\Carbon::now()->toDateTimeString();
                $event->save();
            }
        }
    }




}
