
@extends('layout')

@section('content')

        <!Doctype html>
<html>
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




<h1 class="h-bold" style ="color:black" align="center"> MONTHLY EXPENCES AND INCOME</h1>

<div class ="col-md-12">
    <table width="100%" border="0">

        <td bgcolor="#90ee90" width="75%">

            <table class="table">
                <thead>
                <h1>Total Expences</h1>
                <tr style="background-color: #36c94e">
                    <th><h4>Management Systems and Bill Payments</h4></th>

                    <th><h4 style="color:black">Expences</h4></th>

                </tr>
                </thead>

                <tbody>

                <tr style="background-color: #8fcafe">
                    <td><h4>Electricity Bill Payments</h4></td>
                    <td><h5>Rs. {{$E}}</h5></td>

                </tr>


                <tr style="background-color: #8fcafe">

                    <td><h4>Telephone Bill Payments</h4></td>
                    <td><h5>Rs. {{$T}}</h5></td>
                </tr>

                <tr style="background-color: #8fcafe">

                    <td><h4>Water Bill Payments</h4></td>
                    <td><h5>Rs. {{$W}}</h5></td>
                </tr>

                <tr style="background-color: #8fcafe">

                    <td><h4>Other Bill Payments</h4></td>
                    <td><h5>Rs. {{$Other}}</h5></td>
                </tr>



                <tr style="background-color: #8fcafe">

                    <td><h3>Total Expences</h3></td>
                    <td><h3>Rs. {{$Tot1}}</h3></td>
                </tr>


                </tbody>
            </table>
    </table></div>



<div class ="col-md-12">
    <table width="100%" border="0">

        <td bgcolor="#90ee90" width="100%">


            <table class="table col-md-6">
                <thead>
                <h1>Total Income</h1>
                <tr style="background-color: #36c94e">
                    <th><h4>Management System</h4></th>

                    <th><h4>Incomes</h4></th>

                </tr>
                </thead>

                <tbody>





                <tr style="background-color: #8fcafe">

                    <td><h4>Funds and Donations</h4></td>
                    <td><h5>Rs. {{$funds}}</h5></td>
                </tr>


                </tbody>

            </table></td></table></div>































</html>

@endsection