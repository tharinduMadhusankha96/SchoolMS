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
        <h1 align="center">Canteen Sales</h1>
        <br>
        <table class="table table-bordered">
            <tr>
                <th> Id</th>
                <th>Customer Id</th>
                <th>Product Id</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
            @foreach($CanSale as $row)
                <tr>
                    <td>{{$row['id']}}</td>
                    <td>{{$row['cus_id']}}</td>
                    <td>{{$row['pro_id']}}</td>
                    <td>{{$row['qty']}}</td>
                    <td>{{$row['price']}}</td>
                    <td>{{$row['dis']}}</td>
                    <td>{{$row['amount']}}</td>
                    <td>{{$row['created_at']}}</td>

                </tr>
            @endforeach
        </table>
    </div>
</div>
<br>
<a href="{{asset('canteen_sales')}}">Back</a>