<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link {{Request::is('/') ? 'active' : ''}}" href="/">Home <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link {{Request::is('events') ? 'active' : ''}}" href="{{route("events")}}">Events</a>
            <a class="nav-item nav-link {{Request::is('leisure') ? 'active' : ''}}" href="{{route("leisure")}}">At Your Leisure</a>
            <a class="nav-item nav-link {{Request::is('transportation') ? 'active' : ''}}" href="{{route("transportation")}}">Transportation</a>
            <a class="nav-item nav-link {{Request::is('calendar') ? 'active' : ''}}" href="{{route("calendar")}}">Calendar</a>
            <a class="nav-item nav-link {{Request::is('hotel') ? 'active' : ''}}" href="{{route("hotel")}}">Hotel</a>
<!--
            <a  class="nav-item nav-link" href="http://www.starwoodhotels.com/sheraton/property/overview/index.html?propertyID=127&language=en_US" target="_blank">Hotel</a>
-->
        </div>
    </div>
    <!-- Right Side Of Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Authentication Links -->
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @else
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route("profileDetails")}}">Update profile </a>

                    <a class="dropdown-item" href="{{route("userEvents")}}">My Events</a>

                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        @endguest
    </ul>
</nav>