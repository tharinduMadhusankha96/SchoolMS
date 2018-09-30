@extends('layout')

@section('content')


    <link rel="stylesheet" href="{{asset('/css/ihover.css')}}">
    <link rel="stylesheet" href="{{asset('/css/text_on_image.css')}}">

    <script src="{{asset('/js/card.js')}}">

    </script>


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



    <h1 class="h-bold" style ="color:black" align="center"> Funds and Donation Records </h1>
    <table width="100%" border="0">
        <td bgcolor="#90ee90"width="50%">
            <body>

            <table width="100%" border="0">
                <td bgcolor="#90ee90"width="50%">

                <td>


                    <table class="table">
                        <thead>
                        <tr style="background-color: #36c94e">
                            <th>FundName</th>

                            <th>Donor</th>
                            <th>ReceivedDate</th>
                            <th>Received Type</th>


                            <th>Amount</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($waters as $users)
                            <tr style="background-color: #8fcafe">
                                <td>{{$users->FundNameMonthYear}}</td>

                                <td>{{$users->Donor}}</td>
                                <td>{{$users->ReceivedDate}}</td>
                                <td>{{$users->ReceivedType}}</td>
                                <td>{{$users->Amount}}</td>

                                <td><a href="fedit/{{$users->FundNameMonthYear}}">Edit</a></td>
                                <td><a href="fdelete/{{$users->FundNameMonthYear}}">Delete</a></td>

                            </tr>
                        @endforeach
                    </table>
                </td>

                <td bgcolor="#90ee90"width="50%">
                    <img src="{{asset('images/funds.jpg')}}"width="1100" height="750"></td>

                </tbody>
            </table>


            </body>
        </td>
    </table>
    </html>

@endsection