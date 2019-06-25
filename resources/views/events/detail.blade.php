@extends("layouts.app")
@section("eventDetail")
    <a class="btn btn-primary float-right" href="{{redirect()->back()->getTargetUrl()}}">Back</a>
    <h1>{{$event->name}}</h1>
    <p>{{$event->description}}</p>
    @if($event->leisure === 0)
    <p>{{date("l, F d, Y, h:i a", strtotime($event->date))}}</p>
    @endif
    <?php $count = 0;
        $rsvps = [];
        foreach($event->rsvps()->get() as $rsvp)
        {
            $count += $rsvp->partySize;
            $obj = ['name' => $rsvp->user()->first()->name, 'count' => $rsvp->partySize];
            array_push($rsvps, $obj);
        }
    ?>
    <p>Approx Cost: {{number_format((float) $event->price, 2, '.', '')}}</p>
    <br>
    <h4>Total Count: {{$count}}</h4>
    <hr/>
    @foreach($rsvps as $registration)
        <h5>{{$registration['name']}} ({{$registration['count']}})</h5>
    @endforeach
@endsection