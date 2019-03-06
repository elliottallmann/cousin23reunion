@extends('layouts.app')
@section('landing')
<div class="container-fluid">
    <div class="container">
        <div class="row justify-content-center">
            <img src="{{url('images/san-diego.png')}}" class="img-fluid" >
        </div>
    </div>
    <div class="row justify-content-center">

        <div class="container-fluid col-lg-8 mx-auto">
            <div class="pt-5">
                <p> Welcome to the Cousin 23 Reunion website! This will be a central hub of information for the coming year.
                    While the site is under construction, anticipate changes coming as fast as a college student can make them!
                    Check back periodically for more information!
                </p>
                <p>
                    Festivities will start Friday, July 26, and run through Sunday, July 28. We are looking at reserving a block of rooms in the
                    <a href="http://www.starwoodhotels.com/sheraton/property/overview/index.html?propertyID=127&language=en_US" target="_blank">Sheraton Harbor Island</a>.
                    There will also be an informal get-together the night before, Thursday, July 25.
                </p>
            </div>
        </div>
    </div>
    <div class="container-fluid pt-5">
        <div class="row justify-content-center"
            <div class="container col-lg-8 mx-auto">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3356.4562693163653!2d-117.20005494911668!3d32.727073193743955!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80deab4001579dcf%3A0x4739eb75b8317ce9!2sSheraton+San+Diego+Hotel+%26+Marina!5e0!3m2!1sen!2sus!4v1534414890124" width="600" height="450" frameborder="0" style="border:2px solid #343a40" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
@endsection