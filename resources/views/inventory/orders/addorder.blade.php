@extends('includes.layout')
@section('content')
    <div class="container" style="width: auto;margin-top: 20px">
        @include('messages.message')
        <div class="text-center">
            <h2 class="display-5 text-center" style="font-size:4vw;">
                <strong>Order Items From The Inventory </strong>
            </h2>
        </div>
        <div class="container justify-content-center" style="width: 40%">

            {!! Form::open(['action' => 'Ordercontroller@store','method' => 'POST', 'class'=> 'form-signin text-center']) !!}
            <h1 class="h3 mb-3 font-weight-normal"><strong>Please Enter the items</strong></h1>
            {{csrf_field()}}

            <div class="form-group form-row">
                {!! Form::Label('id', 'Employee ID',['class'=>'text1']) !!}
                {{Form::number('empID',$id ,['class'=>'form-control text1','required'])}}
            </div>
            <div class="form-group form-row text1">
                {{Form::Label('items','Items',['class'=>'text1'])}}
                <select name="items" class="form-control text1" style="color: black">
                    @foreach($st as $s)
                        <option>{{$s}}</option>
                    @endforeach
                    @foreach($labs as $lab)
                        <option>{{$lab}}</option>
                    @endforeach
                    @foreach($res as $r)
                        <option>{{$r}}</option>
                    @endforeach
                    @foreach($sports as $r)
                        <option>{{$r}}</option>
                    @endforeach
                </select>
                {{--{{Form::text('items','',['class'=>'form-control text1','placeholder'=>'Item Name','required'])}}--}}
            </div>
            <div class="form-group form-row">
                {!! Form::Label('types', 'Item type',['class'=>'text1']) !!}
                <select name="type" class="form-control text1" style="color: black">
                    <option>Stationery</option>
                    <option>Resources</option>
                    <option>Laboratory Equipments</option>
                    <option>Sports Items</option>
                </select>
            </div>
            <div class="form-group form-row">
                {!! Form::Label('qantity', 'Quantity',['class'=>'text1']) !!}
                {{Form::number('qty','',['class'=>'form-control text1','placeholder'=>'Quantity','required'])}}
            </div>
            <div class="form-group form-row">
                {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            </div>
            {!! Form::close() !!}

            <a href="/index" class="btn btn-primary text1">Admin Dashboard</a>
            <a href="/orders" class="btn btn-primary text1">Orders</a>
        </div>


    </div>
@endsection