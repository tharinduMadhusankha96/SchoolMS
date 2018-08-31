@extends('layout')


@section('content')

    <div class="container-fluid">

        <div class="row  container-fluid">
            <div class="col-md-9">

                <h1 class="text-light text-center card-header">Event Calendar</h1>

                <div class="col-md-10 container"style="border: 15px; margin-top: 30px; background-color: #adb0af; padding: 20px; color: #002c0e; border-radius: 5%" >

                    {!! $cal_events->calendar() !!}

                </div>
            </div>
            <div class="col-md-3 sideb" >

                @include('include.sidebar')
            </div>
        </div>
    </div>


    {!! $cal_events->script() !!}

@endsection