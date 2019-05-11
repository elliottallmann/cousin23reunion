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
        $events = Event::orderBy("date", 'ASC')->where("valid", true)
            ->where("leisure", false)
            ->get();
        $rsvps = RSVP::all()->where("userId", "=", Auth::id());

        return view("events.events", ["events" => $events,
                                            "rsvps" => $rsvps]);
    }

    public function leisure()
    {
        $events = Event::orderBy("date", 'ASC')->where("valid", true)
            ->where("leisure", true)
            ->get();

        return view("leisure", ["events" => $events]);
    }

    public function add(Request $request)
    {
        $name = $request->input("name");
        $location = $request->input("location");
        $description = $request->input("description");
        $link = $request->input("link");
        $date = $request->input("date");
        $time = $request->input('time');
        $price = $request->input("price");
        $leisure = $request->input("leisure");

        if($leisure === null) {
            $leisure = false;
        } else {
            $leisure = true;
        }
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
        $event->leisure = $leisure;
        $event->price = $price;

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

    public function edit($id)
    {
        if(Event::find($id))
        {
            return view("events.editEvent", ["event" => Event::find($id)]);
        }
        else
        {
            return back()->with("error", "An event with this id does not exist.");
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
        if($partySize === null)
        {
            $partySize = Auth::user()->party_size;
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

    public function userEvents()
    {
        $events = Event::whereHas('rsvps', function ($query) {
            $query->where("userId", '=', Auth::id());
        })->get();
        if(isset($events) && !empty($events))
        {
            return view("users.events", ["events" => $events]);

        }
        return back()->with("error", "You are not registered for any events");
    }

    public function update(Request $request)
    {
            $name = $request->input("name");
            $location = $request->input("location");
            $description = $request->input("description");
            $link = $request->input("link");
            $date = $request->input("date");
            $time = $request->input('time');
            $price = $request->input("price");
            $leisure = $request->input("leisure");
            $id = $request->input("eventID");

            if($leisure === null) {
                $leisure = false;
            } else {
                $leisure = true;
            }
            $event  = Event::find($id);

            if(isset($date) && isset($time))
            {
                $timestr = $date . " " . $time;
                $event->date = $timestr;
            }


            if(isset($name) && $name != $event->name)
            {
                $event->name = $name;
            }
            if(isset($location) && $location !== $event->location)
            {
                $event->location = $location;
            }
            if(isset($description) && $description !== $event->description)
            {
                $event->description = $description;
            }
            if(isset($link) && $link !== $event->link)
            {
                $event->link = $link;
            }

            $event->valid = true;
            $event->leisure = $leisure;
            if(isset($price)  && $price !== $event->price)
            {
                $event->price = $price;
            }

            $event->save();
            return back()->with("success", "Event updated successfully");
    }

    public function getEditUserRegistration($id)
    {
        $event = Event::find($id);
        if(isset($event) && $event !== null)
        {
            $rsvp = RSVP::all()->where("userId", Auth::id())->where("eventId", $event->id)->first();
            if(isset($rsvp) && $rsvp !== null)
            {
                return view("events.editRegistration", ["registration" => $rsvp, "event" => $event]);
            }
            else
            {
                return back()->with("error", "You are not currently registered for that event.");
            }
        }
        else
        {
            return back()->with("error", "Event does not exist");
        }
    }

    public function updateUserRegistration(Request $request)
    {
        $registrationId = $request->input("registrationId");
        $partySize = $request->input("numPeople");

        if(isset($registrationId) && $registrationId !== null)
        {
            $rsvp = RSVP::find($registrationId);
            if(isset($rsvp) && $rsvp !== null)
            {
                if($partySize === "0")
                {
                   return $this->cancelUserRegistration($rsvp->id);
                }
                else
                {
                    $rsvp->partySize = $partySize;
                    $rsvp->save();
                    return back()->with("success", "Registration updated successfully");
                }
            }
            else
            {
                return back()->with("error", "You are not registered for this event.");
            }
        }
        else
        {
            return back()->with("error", "Registration does not exist.");
        }

    }

    public function cancelUserRegistration($id)
    {
        $rsvp = RSVP::find($id);
        if(isset($rsvp) && $rsvp !== null)
        {
            $name = Event::find($rsvp->eventId)->name;
            $rsvp->delete();
            return redirect()->route("events")->with("success", "You have canceled your registration for $name");
        }
    }


}
