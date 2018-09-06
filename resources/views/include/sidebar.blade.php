<div>
    <form action="/Event/search" method="get">

        <input type="text" class="form-control" name="search" placeholder="Search Events"
               style="width: 100%;margin: 10px; margin-top: 20px">

    </form>
</div>

<div class="btn-block" style="padding-top: 15px">
    <button class="btn btn-default " style="width: 100%; min-height: 60px ; background-color: #8affa3; "><a
                href="/Event/calendar">Full Calendar</a></button>
</div>

<hr>
@if(auth()->user())
    @if(auth()->user()->role_id == 2)

        <div class="btn-block" style="padding-top: 15px">
            <button class="btn btn-default " style="width: 100%; min-height: 60px ; background-color: #8affa3; "><a
                        href="/Event/create">Create Event</a></button>
        </div>

        <div class="btn-block" style="padding-top: 15px;padding-bottom: 15px">
            <button class="btn btn-outline-info" style="width: 100%; min-height: 60px ; "><a href="/Event/myevents"
                                                                                             style="color: whitesmoke">My
                    Events</a></button>
        </div>

    @endif
@endif
<hr>
<hr>
<div>

    <div class="container text-center ">
        <h3 class="text-capitalize text-light" style="font-family: 'Adobe Gothic Std B'; padding-top: 10px">
            Archives</h3><br>
        @foreach( $archs as $row)
            <div class="" style="margin-bottom: 5% ">
                <h4><a href="/Event/monthlyEvent?month={{$row['month']}}&year={{$row['year']}}">
                        {{$row['month'].' '.$row['year']}}
                    </a>
                </h4>
            </div>
        @endforeach
    </div>

</div>
{{--<div>--}}
{{--@include('include.cal')--}}
{{--</div>--}}
