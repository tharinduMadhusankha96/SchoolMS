@extends('layout')

@section('content')


    <div class="container-fluid col-md-12">

        <div class="row">

            <div class="col-md-3">

               @include('society.sidebar')

            </div>

            <div class="col-md-9">
                <div class="col-md-12 rounded " style="padding-top:1%">
                    @foreach($societies as $society)
                        <div class="card row" style="margin-bottom:1%; background-color: #ccd9cc ">
                            <div class="card-header">
                                <div>
                                    {{$society->title}}
                                </div>
                            </div>
                            <div class="card-body">
                                <div>
                                    {{$society->from}}
                                    <br>
                                    {{$society->to}}
                                </div>
                            </div>
                            <div class="card-footer">
                                <div>
                                    <button class="btn btn-primary" type="submit" value="Learn More"><a style="color: whitesmoke" href="{{route('Society.show', $society->id )}}">Learn More
                                        </a>
                                    </button>
                                    @if(AUth()->user())
                                    @if(Auth()->user()->id == $society->user_id)
                                        <button class="btn bg-info"  type="Submit" style="margin: 2%"><a
                                                    class="text-white"
                                                    href="{{ action('SocietyController@edit',[$society->id]) }}">Edit
                                                Sport</a>

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
                    @endforeach
                </div>


            </div>

        </div>


    </div>

@endsection