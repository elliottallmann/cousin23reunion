@extends("layouts.app")
@section("editUserRegistration")
    <div class="container-fluid">
        @if(isset($registration) && isset($event))
            <div class="container-fluid">
                <a class="btn btn-primary float-right" href="{{url()->previous()}}">Back</a>
                <h3>
                    {{$event->name}}
                </h3>
                <p>{{$event->description}}</p>
                <p>{{date("l, F d, Y, h:i a", strtotime($event->date))}}</p>
                <p>Approx Cost: {{number_format((float) $event->price, 2, '.', '')}}</p>
                <a href="{{$event->link}}" target="_blank">{{$event->link}}</a>
            </div>

            <form action="{{route("updateUserRegistration")}}" method="POST">
                @CSRF
                <label for="numPeople">Number of people attending:</label>
                <input type="number" min="0" max="{{Auth::user()->party_size}}" step="1" placeholder="{{$registration->partySize}}" name="numPeople" id="numPeople">
                <input type="hidden" id="registrationId" name="registrationId" value="{{$registration->id}}">
                <input type="submit" class="btn btn-info" value="Update Registration">
            </form>
            <a class="btn btn-danger" href="{{route("cancelUserRegistration", ['id'=> $registration->id])}}">Cancel Registration</a>
        @endif
    </div>
@endsection