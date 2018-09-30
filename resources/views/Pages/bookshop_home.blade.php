<!DOCTYPE html>
<html>
<head>
    <style>
        * {
            box-sizing: border-box;
        }

        body,html {
            font-family: Arial;
            padding: 10px;
            background: #58D68D  ;
        }

        /* Header/Blog Title */



        /* Style the top navigation bar */


        /* Style the topnav links */


        /* Change color on hover */

        /* Create two unequal columns that floats next to each other */

        /* Right column */
        .rightcolumn {
            float: left;
            width: 25%;
            background-color: #f1f1f1;
            padding-left: 20px;
            margin-top: 20px;
        }

        /* Fake image */
        .fakeimg {
            background-color: #aaa;
            width: 100%;
            padding: 20px;
        }

        /* Add a card effect for articles */

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }


        .button {
            background-color: #F39C12  ;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other */

    </style>
</head>
<body style="background:#27AE60  ;">


@extends('layouts.apps')
@section('content')

    <div class="row">
        <div class="leftcolumn">
            <div class="card">
                <h2 style="align:center;">BookShop</h2>
                <h5></h5>
                <div class="fakeimg" style="height:200px;">
                    <img src="{{asset('images/canteenIMG.jpg')}}" height="250px" width="1000px"><br>
                    <a href="bookshop_main" class="button">Insert Items</a>
                    <a href="bookshop_sales" class="button button2">Insert Sales</a>
                    <a href="Main_page" class="button button2">Back</a>

                </div>
                <p></p>
                <p></p>
            </div>

        </div>
        <div class="rightcolumn">

            <div class="card">
                <h3>Popular Post</h3>
                <div class="fakeimg"><p>Image</p></div>
                <div class="fakeimg"><p>Image</p></div>
                <div class="fakeimg"><p>Image</p></div>
            </div>

        </div>
    </div>


@endsection
</body>
</html>
