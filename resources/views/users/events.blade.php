@extends('layouts.app')
@section("userEvents")

    <div class="container-fluid">
        <div class="container">
            <h2>My Events</h2>
        </div>
        <div class="container-fluid">
            <ul class="container-fluid">
                <?php $days = ["Thursday", "Friday", "Saturday", "Sunday"]; ?>
                @foreach($days as $day)
                    <h2> {{$day}}</h2>
                    @foreach($events as $event)
                        @if(date("l", strtotime($event->date)) === $day)
                            <div class="container-fluid mb-3">
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
                                <a class="btn btn-info" href="{{route("editUserRegistration", ["eventId" => $event->id])}}">View Registration Details</a>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </ul>
        </div>
    </div>

@endsection