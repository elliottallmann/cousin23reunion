<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cousin Reunion') }}</title>

    <!-- Scripts-->
    <script src="http://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{asset("images/favicon.jpg")}}">
</head>
<body>
    <div id="app">
        <nav class="navbar fixed-top navbar-light bg-light">
            <div class="container">
                <div class="container mx-auto ">
                    <div class="container-fluid">
                        <div class="jumbotron-fluid mx-auto text-center">
                            <h1> Cousin 23 Reunion </h1>
                            <h3> July 25-28, 2019 </h3>
                        </div>
                        @include('partials.nav')
                    </div>
                </div>
            </div>
            </div>
        </nav>

        <main class="py-4 container-fluid col-lg-8">
            @include('flash-message')

            @yield('content')
            @yield('underConstruction')
            @yield('landing')
            @yield('events')
            @yield("addEvent")
            @yield('eventDetail')
            @yield('calendar')
            @yield('profileDetails')
            @yield('userEvents')
            @yield('hotel')
            @yield('leisure')
            @yield('transportation')
        </main>
    </div>


</body>
</html>
