

@extends('layout')

@section('content')


        <!Doctype html>
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


<table width="100%" border="0">
    <td bgcolor="#90ee90"width="50%">

        <div class="col-md-12 animate-box fadeInUp animated-fast" width="50%">
            <h3 > </h3>

            <div class="container" style="background-color: white">





                <form action="{{ action('MonthController@Mindex') }}" method="get">
                    <div class="form-group{{ $errors->has('PaiDate') ? ' has-error' : '' }}">
                        <label for="Place" class="col-md-4 control-label"><h3> Enter Year</h3></label>
                        <input type="text" name="Year"  style="size: 1000px" value="{{old('Month')}}"required></div>
                    <div class="form-group{{ $errors->has('PaiDate') ? ' has-error' : '' }}">
                            <label for="Place" class="col-md-4 control-label"><h3> Enter Month</h3></label>
                            <input type="text" name="Month"  style="size: 1000px" value="{{old('Month')}}" required></div>






                            <button type="submit" class="btn btn-primary">
                                <h4 style="text:bold">Enter </h4>
                            </button>></form>
                        </div>





                    </div>
                </form>

            </div></div>




    </td>
    <td bgcolor="#90ee90"width="50%">


        <img src="{{asset('images/MReport.jpg')}}"width="1100" height="750">





</table>




</body>
</html>
@endsection