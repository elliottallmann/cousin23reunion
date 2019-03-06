@extends("layouts.app")
@section("events")
    <h2> Events </h2>
    <div class="float-right">
        <a class="btn btn-primary" href="/events/create">Create Event</a>
    </div>
    @if($events)
        @foreach($events as $event)
            <div>
                <p>{{$event->name}}</p>
                <p>{{$event->description}}</p>
                <p>{{$event->date}}</p>
                <a href="{{$event->link}}" target="_blank">{{$event->link}}</a>
            </div>
        @endforeach
    @endif
@endsection