

@extends('layout')

@section('content')


        <!Doctype html>
<head>
    <title>View Records</title>
    <style>
        table,tr,td{
            border-collapse: collapse;

            padding-left: 2.5em;
        }

        div.water{
            background-color: lightblue;
            width: 400px;
            padding: 105px;
            border: 15px solid navy;
        }







    </style>
</head>



<h1 class="h-bold" style ="color:black" align="center"> Retrieve Telephone Bill Payment Records </h1>


<table width="100%" border="0">
    <td bgcolor="#90ee90"width="50%">



        <body>

        <table width="100%" border="0">
            <td bgcolor="#90ee90"width="50%">

                <table class="table">
                    <thead>
                    <tr style="background-color: #36c94e">
                        <th>Month and Year</th>
                        <th> Year</th>
                        <th>Place</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                        <th>PaidDate</th>

                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach ($waters as $users)
                        <tr style="background-color: #8fcafe">
                            <td>{{$users->MonthYear}}</td>
                            <td>{{$users->Year}}</td>
                            <td>{{$users->Place}}</td>
                            <td>{{$users->PaymentMethod}}</td>
                            <td>{{$users->Amount}}</td>
                            <td>{{$users->PaidDate}}</td>

                            <td><a href="Tedit/{{$users->MonthYear}}">Edit</a></td>
                            <td><a href="Tdelete/{{$users->MonthYear}}">Delete</a></td>


                        </tr>
                    @endforeach
                    </tbody>
                    </td>

                </table>

            </td>
            <td bgcolor="#90ee90"width="50%">


                <img src="{{asset('images/123.jpg')}}"width="1100" height="750"></td>





        </table>


        @endsection
        </body>
    </td></table>
