@extends("layouts.app")
@section("eventDetail")
    <a class="btn btn-primary float-right" href="{{route("events")}}">Back</a>
    <h1>{{$event->name}}</h1>
    <p>{{$event->description}}</p>
    <p>{{date("l, F d, Y, h:i a", strtotime($event->date))}}</p>

    <br>
    @foreach($event->rsvps()->get() as $rsvp)
        <h4>{{$rsvp->user()->first()->name}} ({{$rsvp->partySize}})</h4>
    @endforeach
@endsection