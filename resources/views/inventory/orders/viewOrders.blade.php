@extends('includes.layout')
@section('content')
    <div class="container" style="margin-top:20px">
        @include('messages.message')
        <div class="text-center">
            <h2 class="display-5 text-center" style="font-size:4vw;">
                <strong>Orders </strong>
            </h2>
        </div>
        <div class="container">
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
                                <button class="btn btn-danger" type="submit"
                                        onclick="
                                     var result = confirm('Are you sure you want to delete this record? ');
                                            if(result){
                                                event.preventDefault();
                                                document.getElementById('delete-form').submit();
                                    }
                                    "> Delete
                                    @if(\Illuminate\Support\Facades\Auth::user()->id == $order->empid || \Illuminate\Support\Facades\Auth::user()->id ==1 )
                                        <form id="delete-form"
                                              action="{{action('Ordercontroller@destroy' , [$order->id])}}"
                                              method="post" style="display:none">
                                            <input type="hidden" name="_method" value="delete">
                                            {{csrf_field()}}
                                        </form>
                                    @endif
                                </button>
                            </td>
                        </strong>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>
                <a href="/index" class="btn btn-primary text1">Admin Dashboard</a>
                <a href="/orders/create" class="btn btn-primary text1">Orders</a>
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
    </div>
@endsection