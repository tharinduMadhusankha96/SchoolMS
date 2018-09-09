@extends('layout')

@section('content')

    <link rel="stylesheet" href="{{asset('/css/card.css')}}">
    <script src="{{asset('/js/card.js')}}"></script>


    <div class="container-fluid col-md-12">

        <div class="row">

            <div class="col-md-3 rounded" style="background-color: dimgrey">

                @include('society.sidebar');
            </div>


            <div class="col-md-9 rounded container-fluid" style="background-color: #a2a2a2">

                <h1 class="text-center text-white card-header">My Societies</h1>
                <hr>

                <div class="row">

                    @foreach($societies as $society)

                        <div class="col-md-5">
                            <div class="container">

                                <div class="active-with-click">
                                    <div class="col-md-10 col-sm-6 col-xs-12">
                                        <div class="material-card Red">
                                            <h2>
                                                <span>{{$society->title}}</span>
                                                <strong>
                                                    <i class="fa fa-fw fa-star"></i>
                                                    The Deer Hunter
                                                </strong>
                                            </h2>
                                            <div class="mc-content">
                                                <div class="img-container">
                                                    <img class="img-responsive" src="/storage/img/{{$society->image}}"
                                                         style="height: inherit">
                                                </div>
                                                <div class="mc-description">
                                                    <h5 class="text-warning">From Grade {{$society->from_grade}}
                                                        To {{$society->to_grade}}</h5>
                                                    <div style="width: inherit">
                                                        <hr>
                                                        <h6>Read More for more Information </h6>
                                                    </div>
                                                </div>
                                                <div class="mc-footer col-md-12">
                                                    {{--<div class="btn btn-success"><a style="color: white; height:50px; width: 70px" href="{{ action('SocietyController@show',[$society->id]) }}">Read More </a></div>--}}
                                                    <div class="btn"><a
                                                                style="background-color:green ;color: #690012; height:10px"
                                                                href="{{ action('SocietyController@show',[$society->id]) }}">Read
                                                            More</a></div>
                                                </div>
                                            </div>
                                            <a class="mc-btn-action">
                                                <i class="fa fa-bars"></i>
                                            </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @endforeach


                </div>

            </div>

        </div>

    </div>

@endsection