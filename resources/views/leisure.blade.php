@extends("layouts.app")
@section("leisure")
    <div class="container-fluid">
        <div class="container">
            <h2 class="text-center mb-5"> Leisure </h2>
        </div>
        @if($events)
            @foreach($events as $event)
                <div class="container-fluid d-flex flex-row mb-5 mx-auto">
                    <div class="container justify-content-center">
                        <h3>
                            <a href="/events/{{$event->id}}">{{$event->name}}</a>
                        </h3>
                        <p>{{$event->description}}</p>
                        <p>Approx Cost: {{number_format((float) $event->price, 2, '.', '')}}</p>
                        <a href="{{$event->link}}" target="_blank">{{$event->link}}</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection