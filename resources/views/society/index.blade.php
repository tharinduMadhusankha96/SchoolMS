@extends('layout')

@section('content')
    <link rel="stylesheet" href="{{asset('/css/soc_card.css')}}">


    <div class="container-fluid col-md-12">

        <div class="row">

            <div class="col-md-3">

               @include('society.sidebar')

            </div>

            <div class="col-md-9">
                <div class="col-md-12 rounded " style="padding-top:1%">
                        <div class="row row-margin-bottom">
                            @foreach($societies as $society)
                                <div class="col-md-5 no-padding lib-item" data-category="view">
                                    <div class="lib-panel">
                                        <div class="row box-shadow rounded">
                                            <div class="col-md-6">
                                                <img class="lib-img-show" src="storage/img/{{$society->image}}" style="width: 180px; height: 150px; border-style:groove">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="lib-row lib-header">
                                                    {{$society->title}}
                                                    <div class="lib-header-seperator"></div>
                                                </div>
                                                <div class="lib-row lib-desc">
                                                    Meetings are on {{$society->meetingsOn}}
{{--                                                    {{$society->from}}--}}
                                                </div>
                                                <div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="padding: 2%; background-color: #bfbfbf">
                                            <div>
                                                <button class="btn btn-primary" type="submit" value="Learn More"><a style="color: whitesmoke" href="{{route('Society.show', $society->id )}}">Learn More
                                                    </a>
                                                </button>
                                                @if(AUth()->user())
                                                    @if(Auth()->user()->id == $society->user_id)
                                                        <button class="btn bg-info"  type="Submit" style="margin: 2%"><a
                                                                    class="text-white"
                                                                    href="{{ action('SocietyController@edit',[$society->id]) }}">Edit
                                                                Society</a>

                                                        </button>
                                                        <button class="btn btn-danger  float-right" type="Submit" style="margin: 2%">
                                                            <a class="text-white" href="#"
                                                               onclick="
                                                                                     var result = confirm('Are you sure youo want to delete this Event? ');

                                                                                     if(result){
                                                                                         event.preventDefault();
                                                                                         document.getElementById('delete-form').submit();
                                                                                     }">Delete Event</a>
                                                            <form id="delete-form"
                                                                  action="{{action('SocietyController@destroy' , [$society->id])}}"
                                                                  method="post" style="display:none">
                                                                <input type="hidden" name="_method"
                                                                       value="delete">
                                                                {{csrf_field()}}
                                                            </form>

                                                        </button>
                                                    @endif
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1"></div>
                            @endforeach
                        </div>
                    </div>
                </div>


            </div>

        </div>


    </div>

@endsection