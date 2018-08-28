<div>
    <form action="/Event/search" method="get">

        <input type="text" class="form-control" name="search" placeholder="Search Events" style="width: 100%;margin: 10px; margin-top: 20px">
        {{--<input type="submit" class="btn btn-primary" value="Search"  style="width: 100%;margin-top: 10px;">--}}

    </form>
</div>

<div class="btn-block" style="padding-top: 15px">
    <button class="btn btn-default " style="width: 100%; min-height: 60px ; background-color: #8affa3; "><a href="/Event/calendar">Full Calendar</a></button>
</div>

<hr>

@if(auth()->user()['role_id'] == 2)

    <div class="btn-block" style="padding-top: 15px">
        <button class="btn btn-default " style="width: 100%; min-height: 60px ; background-color: #8affa3; "><a href="/Event/create">Create Event</a></button>
    </div>

    <div class="btn-block" style="padding-top: 15px">
        <button class="btn btn-outline-info" style="width: 100%; min-height: 60px ; "><a href="/Event/myevents" style="color: whitesmoke" >My Events</a></button>
    </div>
@endif

<hr>

<div>

    <div class="container text-center ">
        <h3 class="text-capitalize text-light" style="font-family: 'Adobe Gothic Std B'; padding-top: 10px">Archives</h3><br>
        <p class=""><a href="#"> January 2018</a> </p><hr>
        <p><a href="#"> January 2018</a> </p><hr>
        <p><a href="#"> February 2018</a> </p><hr>
        <p><a href="#"> March 2018</a> </p><hr>
        <p><a href="#"> Apil 2018</a> </p><hr>
        <p><a href="#"> May 2018</a> </p><hr>
        <p><a href="#"> June 2018</a> </p><hr> <p><a href="#"> July 2018</a> </p><hr>
        <p><a href="#"> August 2018</a> </p><hr>
        <p><a href="#"> September 2018</a> </p><hr>
    </div>

</div>
<div>
    @include('include.cal')
</div>
