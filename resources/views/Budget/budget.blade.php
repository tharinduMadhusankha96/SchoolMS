
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




    <table width="100%" border="0">
        <td bgcolor="#90ee90"width="50%">






            <h1 font-color="White" align="center" >Annual Budget</h1>



            <div class="col-md-12 animate-box fadeInUp animated-fast" width="50%">
                <h3 > </h3>

                <div class="container" style="background-color: white">

                    <form class="form-horizontal" action="{{action('BudgetController@Bstore')}}">


                        <div class="form-group{{ $errors->has('TypeandYear') ? ' has-error' : '' }}">
                            <label for="TypeandYear" class="col-md-4 control-label">Type and Year</label>

                            <div class="col-md-8">
                                <input id="TypeandYear" type="text" class="form-control" name="TypeandYear" placeholder=" Type and Year" required >


                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('Year') ? ' has-error' : '' }}">
                            <label for="Year" class="col-md-4 control-label">Year</label>

                            <div class="col-md-8">
                                <input id="Year" type="text" class="form-control" name="Year" placeholder="Year" required>


                            </div>
                        </div>




                        <div class="form-group{{ $errors->has('ExpectedAmount') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Expected Amount</label>

                            <div class="col-md-8">
                                <input id="ExpectedAmount" type="text" class="form-control" name="ExpectedAmount" value="" required>


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
            </form>

            <form action="{{action('BudgetController@Bindex')}}" method="get">
                <label for="Place" class="col-md-4 control-label"></label>

                <button type="submit" class="btn btn-primary">
                    <h2 style="text:bold">System Detail</h2>
                </button>

            </form>
        </td>


        <td bgcolor="#90ee90"width="50%">
            <form action="{{action('BudgetController@Bsearch')}}" method="post">
                {{ csrf_field() }}
                <input type="text" name="typeandYear" class="search" placeholder="Search" >
                <input type="submit" name="submit" class="submit" value="Search">
            </form>


            <img src="{{asset('images/Budget.jpg')}}"width="1100" height="750"></td>

    </table>





    </body>

@endsection