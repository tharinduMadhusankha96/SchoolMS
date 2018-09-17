@extends('inventory.includes.layout')
@section('content')
    <div class="container" style="margin-top:20px">
        <div class="text-center">
            <h2 class="display-5 text-center" style="font-size:4vw;">
                <strong>Sports Items Details</strong>
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
                    <th scope="col">Sports Item ID</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Supplire ID</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($stocks as $stock)
                    <tr class="text1"><strong>
                            <td> {{$stock->productID}} </td>
                            <td> {{$stock->name}} </td>
                            <td> {{$stock->amount}}</td>
                            <td> {{$stock->supplierID}}</td>
                            <td>
                                <a href="/sports/{{$stock->productID}}/edit" class="btn btn-primary">Edit</a>
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
                                    <form id="delete-form"
                                          action="{{action('Sportscontroller@destroy' , [$stock->productID])}}"
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
                <a href="/sports/create" class="btn btn-primary text1">Update Details</a>
            </div>
        </div>
    </div>
@endsection