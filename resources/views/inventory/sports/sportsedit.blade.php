@extends('inventory.includes.layout')
@section('content')
    <div class="container" style="width: auto;margin-top: 20px">
        <div class="text-center">
            <h2 class="display-5 text-center" style="font-size:4vw;">
                <strong>Enter The Sports Items Details</strong>
            </h2>
        </div>
        <div class="container" style="width: 50%">
            {!! Form::open(['action' => ['Sportstocks@update',$sport->productID],'method' => 'POST', 'class'=> 'form-signin text-center']) !!}
            <input name="_method" type="hidden" value="PATCH">
            {{csrf_field()}}
            <div class="form-group">
                {{Form::text('name', $sport->name,['class'=>'form-control text1','placeholder'=>'Items Name','required'])}}
            </div>
            <div class="form-group">
                {{Form::number('productID',$sport->productID,['class'=>'form-control text1','placeholder'=>'Product ID (500< >600)','required'])}}
            </div>
            <div class="form-group">
                {{Form::number('amount',$sport->amount,['class'=>'form-control text1','placeholder'=>'Amount in stock','required'])}}
            </div>
            <div class="form-group form-row">
                <div>
                    {!! Form::Label('item', 'Supplier:',['class'=>'text1']) !!}
                    <select class="form-control text1" style="color: black" name="supplier">
                        @foreach($suppliers as $supplier)
                            <option>{{$supplier->supplierID}}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
            <div class="text-center" style="margin-top: 30px">
                <a href="/inventory" class="btn btn-outline-info text1">Admin Dashboard</a>
                <a href="/sports" class="btn btn-outline-info text1">Sports Items</a>
            </div>
        </div>

    </div>
@endsection