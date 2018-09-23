@extends('layout')

@section('content')
<div class="container-fluid">
    {!! $chart->html() !!}

</div>



    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
@endsection