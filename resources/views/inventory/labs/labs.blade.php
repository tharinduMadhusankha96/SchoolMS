<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">

    <style>
        html, body {
            background-color: white;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        .text1 {
            font-size: large;
            font-family: "Comic Sans MS";
            color: black;
        }
    </style>
</head>
<body style="width: auto;height: auto">
<div>
    @include('navbar.navbar')
</div>
<div class="container" style="margin-top:20px">
    @include('messages.message')
    <div class="text-center">
        <h2 class="display-5 text-center" style="font-size:4vw;">
            <strong>Laboratory items details</strong>
        </h2>
    </div>
    <div class="container">
        <div class="row" style="margin-top: 20px">
            <div class="col-md-3"></div>
            <div class="col-md-3 text-center text1">
                <div class="card">
                    <div class="card-header" style="background-color: black;color: white;height: 60px">
                        Items with the lowest stock
                    </div>
                    <div class="card-body">
                        {{$st}}
                    </div>

                </div>
            </div>
            <div class="col-md-3 text-center text1">
                <div class="card">
                    <div class="card-header" style="background-color: black;color: white">
                        Ordered SportsItems
                    </div>
                    <div class="card-body">
                        <a class="btn btn-primary" href="/orders">
                            Number of Orders :- {{$orders}}
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 30px">
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th scope="col">Product ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Amount in stock</th>
                <th scope="col">Laboratory Type</th>
                <th scope="col">Supplier ID</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($labs as $lab)
                <tr class="text1"><strong>
                        <td> {{$lab->productID}} </td>
                        <td> {{$lab->name}} </td>
                        <td> {{$lab->amount}}</td>
                        <td> {{$lab->lab_type}}</td>
                        <td> {{$lab->supplierID}}</td>
                        <td>
                            <a href="/labs/{{$lab->productID}}/edit" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <button class="btn btn-danger" type="submit"
                                    onclick="
                                     var result = confirm('Are you sure you want to delete this record? ');
                                            if(result){
                                                event.preventDefault();
                                                document.getElementById('delete-form').submit();
                                            }
                                     "
                            > Delete
                                <form id="delete-form" action="{{action('labscontroller@destroy' , [$lab->productID])}}"
                                      method="post" style="display:none">
                                    <input type="hidden" name="_method" value="delete">
                                    {{csrf_field()}}
                                </form>
                            </button>

                        </td>
                    </strong>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div style="margin-top: 30px">
            <a href="/index" class="btn btn-primary text1">Admin Dashboard</a>
            <a href="/labs/create" class="btn btn-primary text1">Update Details</a>
        </div>
    </div>
</div>
<footer style="margin-top: 100px">
    @include('footer.footer')
</footer>
</body>

</html>