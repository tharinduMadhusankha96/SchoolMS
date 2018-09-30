
@extends('layout')

@section('content')


    <head>
        <title>View Student Records</title>
        <style>
            table,tr,td{
                border-collapse: collapse;

                padding-left: 1.5em;
            }
        </style>
    </head>



    <h1 class="h-bold" style ="color:black" align="center"> Retrieve Water Bill Payment Records </h1>
    <table width="100%" border="0">
        <td bgcolor="#90ee90"width="50%">
            <body>

            <table width="100%" border="0">
                <td bgcolor="#90ee90"width="50%">

                <td>


                    <table class="table">
                        <thead>
                        <tr style="background-color: #36c94e">
                            <th>Month and Year</th>
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

                                <td>{{$users->Place}}</td>
                                <td>{{$users->PaymentMethod}}</td>
                                <td>{{$users->Amount}}</td>
                                <td>{{$users->PaidDate}}</td>

                                <td><a href="edit/{{$users->MonthYear}}">Edit</a></td>
                                <td><a href="delete/{{$users->MonthYear}}">Delete</a></td>



                            </tr>

                        @endforeach
                        </tbody>
                    </table>
                </td>

                <td bgcolor="#90ee90"width="50%">
                    <img src="{{asset('images/wa.jpg')}}"width="1100" height="750"></td>
            </table>


            </body></td>
    </table>
@endsection