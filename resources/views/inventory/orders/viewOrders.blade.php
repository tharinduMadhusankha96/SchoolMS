@extends('layout')
@section('content')
    <div class="container" style="margin-top:10px">
        @if(count($orders)>0)
            <div class="text-center">
                <h2 class="display-5 text-center" style="font-size:4vw;">
                    <strong>Orders </strong>
                </h2>
            </div>
        @else
            <div class="text-center">
                <h2 class="display-5 text-center" style="font-size:4vw;">
                    <strong> No Orders </strong>
                </h2>
            </div>
        @endif
        @if(count($orders)>0)
            <div class="container" style="margin-top: 30px">
                <div class="container pull-right">
                    <a href="/orders/create" class="btn btn-outline-info text1" style="background-color: limegreen">AddOrders</a>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Employee ID</th>
                        <th scope="col">Item Name</th>
                        <th scope="col">Item Type</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Added Date</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr class="text1"><strong>
                                <td> {{$order->id}} </td>
                                <td> {{$order->empid}} </td>
                                <td> {{$order->items}}</td>
                                <td> {{$order->type}}</td>
                                <td> {{$order->quantity}}</td>
                                <td> {{$order->created_at}}</td>
                                <td>
                                    <form id="delete-form" action="{{action('Ordercontroller@destroy' ,[$order->id] )}}"
                                          method="post">
                                        <input type="hidden" name="_method" value="delete">
                                        {{ csrf_field() }}
                                        <button type="submit" class=" btn btn-default btn-danger text1">Delete</button>
                                    </form>
                                </td>
                            </strong>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div style="margin-top: 20px">
                    <a href="/inventory" class="btn btn-outline-primary text1">INVENTORY DASHBOARD</a>
                </div>
            </div>
        @else
            <div class="container">
                <div class="container-box" style="width: auto;height: 300px">
                    <div class="img-responsive">
                        <img src="{{asset('images/inventory_order.gif')}}" style="width: 100%;height:300px;">
                    </div>
                </div>
                <div style="margin-top: 20px">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <a href="/inventory" class="btn btn-primary text1">INVENTORY DASHBOARD</a>
                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>
        @endif

        {{--@if(\Illuminate\Support\Facades\Auth::user()->id == 1)--}}
        {{--<button class="btn btn-danger text1" type="submit" onclick="--}}
        {{--var result = confirm('Are you sure you want to reset the table data? ');--}}
        {{--if(result){--}}
        {{--event.preventDefault();--}}
        {{--document.getElementById('delete').submit();--}}
        {{--}--}}

        {{--"> Reset Table Data--}}
        {{--<form id="delete"--}}
        {{--action="{{action('Ordercontroller@truncate')}}"--}}
        {{--method="get" style="display:none">--}}
        {{--{{csrf_field()}}--}}
        {{--</form>--}}
        {{--</button>--}}
        {{--@endif--}}
    </div>

    </div>
@endsection