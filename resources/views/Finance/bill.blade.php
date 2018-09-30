

@extends('layout')

@section('content')

    <style>
        div.vg{

            width: 100px;
            height: 100px;

        }
        .search{
            width:45% ;
            padding:10px ;
            font-size:20px ;

        }
        .submit{
            width:15% ;
            padding:10px ;
            font-size:20px ;
            background-color:#333333;
            color: white;
        }



    </style>

    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-custom">



    <div class="container-fluid" align="center" style="background-color: #90ee90">
        <div class="row">
            <div class="col-md-12">
                <h1 class="h-bold" style ="color:black"> Bill Payments and Other Payments </h1>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <img alt="Bootstrap Image Preview" width="40%" src="{{asset('images/water.jpg')}}" />
                <a href="/Water/water"> <h2>
                        Water Bill Payments
                    </h2></a>
            </div>
            <div class="col-md-6">
                <img alt="Bootstrap Image Preview" width="45%" src="{{asset('images/ebill.jpg')}}" />
                <a href="/Electric/Electric"> <h2>
                        Electricity Bills Payments
                    </h2></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <img alt="Bootstrap Image Preview" width="45%" src="{{asset('images/123.jpg')}}" />
                <a href="/Tele/Telephone"> <h2>
                        Telephone Bills Payments
                    </h2></a>
            </div>
            <div class="col-md-6">
                <img alt="Bootstrap Image Preview" width="45%" src="{{asset('images/other_payment.png')}}" />
                <a href="/Other/other"> <h2>
                        Other Payments
                    </h2></a>
            </div>
        </div>
    </div>






    </body>

@endsection