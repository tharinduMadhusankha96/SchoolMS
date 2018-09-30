

@extends('layout')

@section('content')





        <!Doctype html>
<head>
    <title>View Student Records</title>
    <style>
        table,tr,td{
            border-collapse: collapse;

            padding-left: 1.5em;
        }
    </style>
</head>



<h1 class="h-bold" style ="color:black" align="center"> Annual Budget Record </h1>
<table width="100%" border="0">
    <td bgcolor="#90ee90"width="50%">
        <body>

        <table width="100%" border="0">
            <td bgcolor="#90ee90"width="50%">

            <td>


                <table class="table">
                    <thead>
                    <tr style="background-color: #36c94e">
                        <th>TypeandYear</th>
                        <th>Year</th>
                        <th>Amount</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($Electrics as $users)
                        <tr style="background-color: #8fcafe">
                            <td>{{$users->TypeandYear}}</td>
                            <td>{{$users->Year}}</td>
                            <td>{{$users->ExpectedAmount}}</td>
                            <td><a href="Bedit/{{$users->TypeandYear}}">Edit</a></td>
                            <td><a href="BDelete/{{$users->TypeandYear}}">Delete</a></td>

                        </tr>
                    @endforeach
                </table>
            </td>

            <td bgcolor="#90ee90"width="50%">
                <img src="{{asset('images/Budget.jpg')}}"width="1100" height="750"></td>


            </tbody>
        </table>



        </body>
    </td>
</table>
</html>

@endsection