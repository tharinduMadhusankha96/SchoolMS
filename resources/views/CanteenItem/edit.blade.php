<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #D0D3D4;
        }

        * {
            box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
            background-color: white;
        }

        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        input[type=number], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit button */
        .registerbtn {
            background-color: #935116;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }
    </style>
</head>
<body>
@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $errors)
                <li>{{$errors}}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(\Session::has('success'))
    <div class="alert alert-success">
        <p>{{\Session::get('success')}}</p>
    </div>
@endif

<h1 align="center">Canteen Products</h1>

{!! Form::open(['action'=>['CanteenProductController@update',$CanteenItem->id],'method'=>'POST'])!!}

<div class="form-group">
    {{Form::label('productname','productname')}}
    {{Form::text('productname',$CanteenItem->productname,['class'=>'form-control','placeholder'=>'Product Name'])}}
</div>
<div class="form-group">
    {{Form::label('qty','Quantity')}}
    {{Form::number('qty',$CanteenItem->qty,['class'=>'form-control','min'=>'1','placeholder'=>'Quantity'])}}
</div>

<div class="form-group">
    {{Form::label('price','Price')}}
    {{Form::number('price',$CanteenItem->price,['class'=>'form-control','min'=>'0','placeholder'=>'Item Price'])}}
</div>
<div class="form-group">
    {{Form::label('dis','dis')}}
    {{Form::number('dis',$CanteenItem->dis,['class'=>'form-control','min'=>'0','placeholder'=>'Discount'])}}
</div>
<div class="form-group">
    {{Form::label('amount','amount')}}
    {{Form::number('amount',$CanteenItem->amount,['class'=>'form-control','min'=>'0','placeholder'=>'Amount'])}}
</div>


{{Form::submit('Submit',['class'=>'registerbtn'])}}
{!! Form::close() !!}<br><br>
<a href="{{asset('canteen_main')}}" class="registerbtn">Back</a>


</body>
</html>
