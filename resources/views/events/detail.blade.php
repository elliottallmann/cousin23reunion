@extends("layouts.app")
@section("eventDetail")
    <a class="btn btn-primary float-right" href="{{redirect()->back()->getTargetUrl()}}">Back</a>
    <h1>{{$event->name}}</h1>
    <p>{{$event->description}}</p>
    @if($event->leisure === 0)
    <p>{{date("l, F d, Y, h:i a", strtotime($event->date))}}</p>
    @endif
    <p>Approx Cost: {{number_format((float) $event->price, 2, '.', '')}}</p>
    <br>
    @foreach($event->rsvps()->get() as $rsvp)
        <h4>{{$rsvp->user()->first()->name}} ({{$rsvp->partySize}})</h4>
    @endforeach
@endsection