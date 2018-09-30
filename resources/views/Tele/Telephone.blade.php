



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

    <body id="page-top" data-spy="scroll" data-target=".navbar-custom">
   



    <table width="100%" border="0">
        <td bgcolor="#90ee90"width="50%">






            <h1 font-color="White" align="center" >Telephone Bill Payments</h1>



            <div class="col-md-12 animate-box fadeInUp animated-fast" width="50%">
                <h3 > </h3>

                <div class="container" style="background-color: white">

                    <form class="form-horizontal" action='{{ route('TeleController@Tstore') }}'>

                        <div class="form-group">
                            <label for="MonthYear" class="col-md-4 control-label">MonthYear</label>

                            <div class="col-md-8">
                                <input id="MonthYear" type="text" class="form-control" name="MonthYear" placeholder=" Month Year" value="{{ old('MonthYear') }}" required >



                            </div>
                        </div>







                        <div class="form-group">
                            <label for="Place" class="col-md-4 control-label">Place</label>

                            <div class="col-md-8">
                                <div >
                                    <input id="text" type="text" class="form-control" name="Place" value="{{ old('Place') }}" required>


                                </div>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="text" class="col-md-4 control-label">Payment Method</label>

                            <div class="col-md-8">

                                <input id="radio" type="radio" name="PaymentMethod" value="cash" checked>cash
                                <input id="radio" type="radio" name="PaymentMethod" value="cheque" checked>cheque

                            </div>


                        </div>


                        <div class="form-group">
                            <label for="text" class="col-md-4 control-label">Amount</label>

                            <div class="col-md-8">
                                <input id="Amount" type="text" class="form-control" name="Amount" value="{{ old('Amount') }}" required>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Place" class="col-md-4 control-label">Paid Date</label>

                            <div class="col-md-8">
                                <div >
                                    <input id="text" type="date" class="form-control" name="PaidDate" value="{{ old('PaidDate') }}" required>

                                </div>
                            </div>
                        </div>





                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>


            <form action="{{action('TeleController@Tindex')}}" method="get">

                <label for="Place" class="col-md-4 control-label"></label>

                <button type="submit" class="btn btn-primary">
                    <h2 style="text:bold">System Detail</h2>
                </button>

            </form>


        </td>



        <td bgcolor="#90ee90"width="50%">

            <form action="{{action('TeleController@Tindex')}}" method="post">
                {{ csrf_field() }}
                <input type="text" name="monthYear" class="search" placeholder="Search" value="{{old('monthYear')}} ">
                <input type="submit" name="submit" class="submit" value="Search">

            </form>



            <img src="{{asset('images/123.jpg')}}"width="1100" height="750"></td>

    </table>





    @endsection


    </body>

