<style>
    .button {
        background-color:#A93226;
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
    body{
        background: #D1F2EB    ;
    }

    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        border: 1;
        background: #D98880    ;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
    a:link, a:visited {
        background-color:#2E86C1  ;
        color: white;
        padding: 14px 25px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }


    a:hover, a:active {
        background-color:#E59866;
    }
</style>
@if(count($errors)>0)
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $errors)
                <li>{{$errors}}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(\Session::has('success'))
    <div class="alert alert-success">
        <p>{{\Session::get('success')}}</p>
    </div>
@endif
<div class="row">
    <div class="col-md-12">
        <br>
        <h1 align="center">Canteen Orders</h1>
        <br>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Supplier Name</th>
                <th>Phone Number</th>
                <th>E-Mail</th>
                <th>Item Type</th>
                <th>qty</th>
                <th>Date</th>
                <th>Edit</th>
                <th>Delete</th>

            </tr>
            @foreach($CanteeenSupplier as $row)
                <tr>
                    <td>{{$row['id']}}</td>
                    <td>{{$row['name']}}</td>
                    <td>{{$row['phone']}}</td>
                    <td>{{$row['email']}}</td>
                    <td>{{$row['type']}}</td>
                    <td>{{$row['qty']}}</td>
                    <td>{{$row['created_at']}}</td>

                    <td><a href="{{action('CanteenSupplierController@edit',$row['id'])}}">Edit</a></td>
                    <td>{!!Form::open(['action'=>['CanteenSupplierController@destroy',$row['id']],'method'=>'POST','class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete',['class'=>'button'])}}
                        {!!Form::close()!!}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
<br>
<a href="{{asset('canteen_supplier')}}">Back</a>