


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
    @if(count($errors)>0)
        <div class="row">
            <div class="col-md-6">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>

            </div>

        </div>
    @endif



    <table width="100%" border="0">
        <td bgcolor="#90ee90"width="50%">






            <h1 font-color="White" align="center" >Electric bill  Payments Record Update</h1>



            <div class="col-md-12 animate-box fadeInUp animated-fast" width="50%">
                <h3 > </h3>

                <div class="container" style="background-color: white">

                    <form class="form-horizontal" action='{{url('fUpdate')}}' method="post">
                        {{ csrf_field() }}


                        <div class="form-group{{ $errors->has('FundNameMonthYear') ? ' has-error' : '' }}">
                            <label for="FundNameMonthYear" class="col-md-4 control-label">FundNameMonthYear</label>

                            <div class="col-md-8">
                                <input id="FundNameMonthYear" type="text" class="form-control" name="FundNameMonthYear" placeholder=" FundNameMonthYear" value="{{$FundNo}}" required abled>

                                @if ($errors->has('FundNameMonthYear'))
                                    <span class="help-block">
										<strong>{{ $errors->first('FundNameMonthYear') }}</strong>
									</span>
                                @endif



                            </div>
                        </div>





                        <div class="form-group{{ $errors->has('Donor') ? ' has-error' : '' }}">
                            <label for="Donor" class="col-md-4 control-label">Donor</label>

                            <div class="col-md-8">
                                <div >
                                    <input id="Donor" type="text" class="form-control" name="Donor" value="{{ old('Donor') }}" required>
                                    @if ($errors->has('Donor'))
                                        <span class="help-block">
										<strong>{{ $errors->first('Donor') }}</strong>
									</span>
                                    @endif

                                </div>
                            </div>

                        </div>
                        <div class="form-group{{ $errors->has('ReceivedDate') ? ' has-error' : '' }}">
                            <label for="Received" class="col-md-4 control-label">ReceivedDate</label>

                            <div class="col-md-8">
                                <div >
                                    <input id="ReceivedDate" type="date" class="form-control" name="ReceivedDate" value="{{ old('ReceivedDate') }}" required>

                                    @if ($errors->has('ReceivedDate'))
                                        <span class="help-block">
										<strong>{{ $errors->first('ReceivedDate') }}</strong>
									</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="ReceivedType" class="col-md-4 control-label">ReceivedType</label>

                            <div class="col-md-8">

                                <input id="radio" type="radio" name="ReceivedType" value="cash" checked>cash
                                <input id="radio" type="radio" name="ReceivedType" value="cheque" checked>cheque

                            </div>


                        </div>


                        <div class="form-group{{ $errors->has('Amount') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">Amount</label>

                            <div class="col-md-8">
                                <input id="Amount" type="text" class="form-control" name="Amount" value="{{ old('Amount') }}" required>
                                @if ($errors->has('Year'))
                                    <span class="help-block">
										<strong>{{ $errors->first('Amount') }}</strong>
									</span>
                                @endif

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



        </td>




        <td bgcolor="#90ee90"width="50%">





            <img src="{{asset('images/funds.jpg')}}"width="1100" height="750"></td>


    </table>



    </body>



    </body>

    </html>

@endsection