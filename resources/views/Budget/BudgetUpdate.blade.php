



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






            <h1 font-color="White" align="center" >Budget Record Update</h1>



            <div class="col-md-12 animate-box fadeInUp animated-fast" width="50%">
                <h3 > </h3>

                <div class="container" style="background-color: white">

                    <form class="form-horizontal" action='{{action('BudgetController@Bupdate')}}' method="post">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('TypeandYear') ? ' has-error' : '' }}">
                            <label for="TypeandYear" class="col-md-4 control-label">TypeandYear</label>

                            <div class="col-md-8">
                                <input id="TypeandYear" type="text" class="form-control" name="TypeandYear" Placeholder=" Type and  Year" value="{{$Bid}}" required abled>

                                @if ($errors->has('TypeandYear'))
                                    <span class="help-block">
										<strong>{{ $errors->first('TypeandYear') }}</strong>
									</span>
                                @endif



                            </div>
                        </div>




                        <div class="form-group{{ $errors->has('Year') ? ' has-error' : '' }}">
                            <label for="Year" class="col-md-4 control-label">Year</label>

                            <div class="col-md-8">
                                <div >
                                    <input id="text" type="text" class="form-control" name="Year" value="{{ old('Year') }}" required>
                                    @if ($errors->has('Year'))
                                        <span class="help-block">
										<strong>{{ $errors->first('Year') }}</strong>
									</span>
                                    @endif

                                </div>
                            </div>

                        </div>




                        <div class="form-group{{ $errors->has('ExpectedAmount') ? ' has-error' : '' }}">
                            <label for="text" class="col-md-4 control-label">ExpectedAmount</label>

                            <div class="col-md-8">
                                <input id="ExpectedAmount" type="text" class="form-control" name="ExpectedAmount" value="{{ old('ExpectedAmount') }}" required>
                                @if ($errors->has('Year'))
                                    <span class="help-block">
										<strong>{{ $errors->first('ExpectedAmount') }}</strong>
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





            <img src="{{asset('images/Budget.jpg')}}"width="1100" height="750"></td>

    </table>



    </body>



    </body>

    </html>

@endsection