<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Event;
use App\RSVP;
use App\User;
use Illuminate\Support\Facades\Session;

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
        $events = Event::all()->where("valid", true);
        $rsvps = RSVP::all()->where("userId", "=", Auth::id());

        return view("events.events", ["events" => $events,
                                            "rsvps" => $rsvps]);
    }

    public function add(Request $request)
    {
        $name = $request->input("name");
        $location = $request->input("location");
        $description = $request->input("description");
        $link = $request->input("link");
        $date = $request->input("date");
        $time = $request->input('time');
        $author_id = Auth::id();

      $timestr = $date . " " . $time;
        $event  = new Event;
        $event->name = $name;
        $event->location = $location;
        $event->description = $description;
        $event->link = $link;
        $event->date = $timestr;
        $event->authorId = $author_id;
        $event->valid = true;

        $event->save();
        return redirect("events");
    }

    public function getAdd()
    {
        return view("events/addEvent");
    }

    public function delete(Request $request)
    {
        $eventId = $request->input("event_id");

        if(Auth::user()->isAdmin())
        {
            $event = Event::find($eventId);
            if($event)
            {
                $event->valid = false;
                $event->updatedAt = \Carbon\Carbon::now()->toDateTimeString();
                $event->save();
            }
        }
    }

    public function edit(Request $request)
    {
        $eventId = $request->input("id");
        $event = Event::all()::find("id", $eventId);

        if($event->authorId == Auth::id() || Auth::user()->isAdmin)
        {
            return view("events/edit", ["event" => $event]);
        }
        else
        {
            return redirect()->back()->with("error", "Not Authorized");
        }
    }

    public function rsvp(Request $request)
    {
        $id = $request->input("eventId");
        $partySize = $request->input("partySize");

        $userId = Auth::id();

        $previousRSVP = RSVP::where("userId", "=" ,$userId)->where("eventId", "=" , $id)->exists();
        if($previousRSVP)
        {
            return back()->with("error", "You are already registered for this event");
        }

        $rsvp = new RSVP();
        $rsvp->eventId = $id;
        $rsvp->partySize = $partySize;
        $rsvp->userId = $userId;
        $saved = $rsvp->save();

        if($saved)
        {
            return back()->with("success", "You have registered for this event!");
        }
        else
        {
            return back()->with("error", "Failed to register for the event. Please contact elliott.allmann@gmail.com");
        }

    }

    public function detail($id)
    {
        $event = Event::with(['rsvps.user'])->find($id);
        if($event === null)
        {
            return back()->with("error", "event with id $id does not exist");
        }
        return view('events.detail', ['event' => $event]);

    }



}
