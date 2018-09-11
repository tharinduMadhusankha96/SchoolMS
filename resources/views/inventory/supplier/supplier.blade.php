@extends('includes.layout')
@section('content')
    <div class="container" style="margin-top:20px">
        @include('messages.message')
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
                                          action="{{action('Suppliercontroller@destroy' , [$supplier->supplierID])}}"
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
                <a href="/supplier/create" class="btn btn-primary text1">Update Details</a>
            </div>
        </div>

    </div>
@endsection