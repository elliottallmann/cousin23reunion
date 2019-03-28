@extends("layouts.app")
@section("events")
    <div class="container-fluid col-lg-10">
        <h2 class="text-center mb-5"> Events </h2>
        @if(Auth::user()->admin)
        <div class="float-right position-relative">
            <a class="btn btn-primary" href="/events/create">Create Event</a>
        </div>
        @endif
        @if($events)
            @foreach($events as $event)
                <div class="container-fluid d-flex flex-row mb-5 mx-auto">
                    <div class="container justify-content-center">
                        <h3>
                            <a href="/events/{{$event->id}}">{{$event->name}}</a>
                        </h3>
                        <p>{{$event->description}}</p>
                        <p>{{date("l, F d, Y, h:i a", strtotime($event->date))}}</p>
                        <a href="{{$event->link}}" target="_blank">{{$event->link}}</a>
                    </div>
                    <div class="ml-5 container">
                        <?php  $found = false; ?>
                        @foreach($rsvps as $rsvp)
                            @if($rsvp->eventId == $event->id)
                                <?php $found = true; ?>
                            @endif
                        @endforeach
                        @if($found)
                            <button type="button" class="btn btn-success">Registered!</button>
                        @else
                            <button type="button" class="btn btn-primary" data-id="{{$event->id}}" id="rsvpModalLaunch" data-toggle="modal" data-target="#rsvpModal">RSVP</button>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
        <!-- Modal -->
        <div class="modal fade" id="rsvpModal" tabindex="-1" role="dialog" aria-labelledby="rsvpModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="rsvpModalLabel">RSVP</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="rsvpForm" method="post" action="{{action('EventController@rsvp')}}">
                            @csrf
                            <input type="hidden" name="eventId" id="eventId">
                            <br>
                            <label for="partialParty">How many from your party?</label>
                            <input type="number" min="1" max="{{Auth::user()->party_size}}" name="partySize" id="partySize" placeholder="{{Auth::user()->party_size}}">
                            <input type="submit" class="btn btn-primary" value="RSVP">
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#rsvpModal').on('show.bs.modal', function (event) {
            let button = $(event.relatedTarget);
            let id = button.data('id');
            console.log(id);
            console.log(this);
            $(this).find("#rsvpForm input[name='eventId']").val(id);
        });
    </script>
@endsection
