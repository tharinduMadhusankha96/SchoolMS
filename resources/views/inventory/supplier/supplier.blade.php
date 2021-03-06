@extends('layout')
@section('content')
    <div class="container" style="margin-top:20px">
        <div class="text-center">
            <h2 class="display-5 text-center" style="font-size:4vw;">
                <strong>Supplier Details</strong>
            </h2>

        </div>

        <div class="container" style="margin-top:30px">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">Supplier ID</th>
                    <th scope="col">Supplier Name</th>
                    <th scope="col">Supplier E-mail</th>
                    <th scope="col">Contact Details</th>
                    <th scope="col">Supply Item</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($suppliers as $supplier)
                    <tr class="text1"><strong>
                            <td> {{$supplier->supplierID}} </td>
                            <td> {{$supplier->name}} </td>
                            <td> {{$supplier->email}}</td>
                            <td> {{$supplier->contact_details}}</td>
                            @if($supplier->type == 'S')
                                <td> Stationary</td>
                            @elseif($supplier->type == 'L')
                                <td> Laboratary Equipments</td>
                            @elseif($supplier->type == 'SP')
                                <td>Sports Items</td>
                            @elseif($supplier->type == 'R')
                                <td>School Resources</td>
                            @endif
                            <td>
                                <a href="/supplier/{{$supplier->supplierID}}/edit" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form id="delete-form" action="{{action('Suppliercontroller@destroy' ,[$supplier->supplierID] )}}"
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
            <div style="margin-top: 30px">
                <a href="/inventory" class="btn btn-primary text1">Admin Dashboard</a>
                <a href="/supplier/create" class="btn btn-primary text1">+Add</a>
                <a href="/live_search" class="btn btn-primary text1">Search</a>
            </div>
        </div>

    </div>
@endsection