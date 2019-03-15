@extends("layouts.app")
@section("eventDetail")
    <iframe src="https://calendar.google.com/calendar/embed?showPrint=0&amp;showTabs=0&amp;mode=WEEK&amp;height=600&amp;wkst=2&amp;dates=20190724%2F20190728&amp;bgcolor=%23FFFFFF&amp;src=reol3jrk6pi6k3un18ss47e32s%40group.calendar.google.com&amp;color=%232952A3&amp;ctz=America%2FLos_Angeles" style="border-width:0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
    <h1>{{$event->name}}</h1>
    <p>{{$event->description}}</p>
    <p>{{date("m-d-Y h:i a").strtotime($event->date)}}</p>
    @foreach($event->rsvps()->get() as $rsvp)
        <h4>{{$rsvp->user()->first()->name}} ({{$rsvp->partySize}})</h4>
    @endforeach
@endsection