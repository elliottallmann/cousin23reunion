@extends('layouts.app')
@section("profileDetails")
    <div class="container-fluid">
        <h3> Update profile</h3>
        @if(isset($user))
        <form method="post" action="{{route("updateProfile")}}">
            <div class="form-group">
                @csrf
                <label for="name">Name: </label>
                <input type="text" class="form-control" name="name" id="name" placeholder="{{$user->name}}">

                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="{{$user->email}}">

                <label for="partySize">Party Size:</label>
                <input type="number" class="form-control" min="1" name="partySize" id="partySize" placeholder="{{$user->party_size}}">

                <input type="submit" class="btn btn-success mt-5" value="Submit">
            </div>
        </form>
        @endif
    </div>
@endsection