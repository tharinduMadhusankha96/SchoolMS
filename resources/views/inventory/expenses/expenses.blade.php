@extends('includes.layout')
@section('content')
    <div class="container" style="margin-top:20px">
        @include('messages.message')
        <div class="text-center">
            <h2 class="display-5 text-center ">
                <strong>Monthly Expenses details</strong>
            </h2>
        </div>
        <div class="container" style="margin-top: 30px">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">Invoice ID</th>
                    <th scope="col">Product ID</th>
                    <th scope="col">Supplier ID</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Added Date</th>
                    <th scope="col">Updated Date</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($expenses as $e)
                    <tr class="text1"><strong>
                            <td> {{$e->invoiceID}} </td>
                            <td> {{$e->productID}} </td>
                            <td> {{$e->supplierID}}</td>
                            <td> {{$e->quantity}}</td>
                            <td> {{$e->price}}</td>
                            <td> {{$e->created_at}}</td>
                            <td> {{$e->updated_at}}</td>
                            <td>
                                <a href="/expenses/{{$e->invoiceID}}/edit" class="btn btn-primary">Edit</a>
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
                                          action="{{action('Expensescontroller@destroy' , [$e->invoiceID])}}"
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
            <div style="margin-top: 50px">
                <a href="/index" class="btn btn-primary text1">Admin Dashboard</a>
                <a href="/expenses/create" class="btn btn-primary text1">Update Details</a>
            </div>
        </div>
    </div>
@endsection