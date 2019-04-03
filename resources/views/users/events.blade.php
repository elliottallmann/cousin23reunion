@extends('layouts.app')
@section("userEvents")

    <div class="container-fluid">
        <div class="container">
            <h2>My Events</h2>
        </div>
        <div class="container-fluid">
            <ul class="container-fluid">
                @foreach($events as $event)
                    <div class="container-fluid mt-5">
                        <div class="container">
                           <h4><a href="/events/{{$event->id}}">{{$event->name}}</a> </h4>
                        </div>
                        <div class="container">
                            {{$event->description}}
                        </div>
                        <div class="container">
                            {{date("l, F d, Y, h:i a", strtotime($event->date))}}
                        </div>
                        <div class="container">
                            {{$event->rsvps()->first()->party_size}}
                        </div>
                    </div>
                @endforeach
            </ul>
        </div>

    </div>

@endsection