@extends("layouts.app")
@section("addEvent")
<div class="container-fluid">
    <h2> Add Event!</h2>
    <div class="container">
        <form action="/events/create" method="POST">
            @csrf
            <label for="name">Name:</label>
            <input type="text" name="name">
            <label for="description">Description:</label>
            <textarea type="text" name="description"></textarea>
            <label for="date">Date:</label>
            <input type="date" name="date">
            <label for="time">Time:</label>
            <input type="time" name="time">
            <label for="link">URL:</label>
            <input type="url" name="link">
            <label for="location">Location:</label>
            <input type="text" name="location">
            <input type="submit" value="Submit!">
        </form>
    </div>
</div>
@endsection
