<!DOCTYPE html>
<html>
<head>
    <title>Download</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
        .box{
            width:600px;
            margin:0 auto;
        }
    </style>
</head>
<body>
<br />
<div class="container">
    <h3 align="center">Canteen Product Details</h3><br />

    <div class="row">
        <div class="col-md-7" align="right">
            <h4></h4>
        </div>
        <div class="col-md-5" align="right">
            <a href="{{ url('dynamic_pdfc/pdf') }}" class="btn btn-danger">Download Details</a>
        </div>
    </div>
    <br />
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th> Discount</th>
                <th>Amount</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($customer_data as $customer)
                <tr>
                    <td>{{ $customer->productname }}</td>
                    <td>{{ $customer->qty }}</td>
                    <td>{{ $customer->price }}</td>
                    <td>{{ $customer->dis }}</td>
                    <td>{{ $customer->amount }}</td>
                    <td>{{ $customer->created_at }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{asset('canteen_main')}}" class="button button2">Back</a>
    </div>
</div>
</body>
</html>
