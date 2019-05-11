@extends("layouts.app")
@section("editEvent")
    <div class="container-fluid">
        <h3> Edit Event</h3>
        @if(isset($event))
            <form method="post" action="{{route("updateEvent")}}">
                <div class="form-group">
                    @csrf
                    <label for="name">Name: </label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="{{$event->name}}">

                    <label for="location">Location:</label>
                    <input type="text" class="form-control" name="location" id="location" placeholder="{{$event->location}}">

                    <label for="date">Date:</label>
                    <input type="date" class="form-control" name="date" id="date" placeholder="{{$event->date}}">

                    <label for="time">Time:</label>
                    <input type="time" class="form-control" name="time" id="time" placeholder="{{$event->time}}}">

                    <label for="link">URL:</label>
                    <input type="url" class="form-control" name="link" id="link" placeholder="{{$event->link}}">

                    <label for="price">Price:</label>

                    <input type="number" class="form-control" min="0" max="1000" step=".01" name="price" id="price" placeholder="{{number_format((float) $event->price, 2, '.', '')}}">

                    <label for="leisure">Leisure:</label>
                    <input type="checkbox" name="leisure" id="leisure" placeholder="{{$event->leisure}}">

                    <input type="hidden" name="eventID" id="eventID" value="{{$event->id}}">
                    <input type="submit" class="btn btn-success mt-5" value="Submit">
                </div>
            </form>
        @endif
    </div>
@endsection
