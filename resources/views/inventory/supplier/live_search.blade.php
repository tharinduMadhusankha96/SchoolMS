@extends('layout')
@section('content')
<div class="container">
    <div class="container box">
        <h3 align="center"></h3><br/>
        <div class="panel panel-default">
            <div class="panel-heading">Search Supplier Data</div>
            <div class="panel-body">
                <div class="form-group">
                    <input type="text" name="search" id="search" class="form-control"
                           placeholder="Search Supplier Data"/>
                </div>
                <div class="table-responsive">
                    <h3 align="center">Total Data : <span id="total_records"></span></h3>
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Supplier Name</th>
                            <th>Supplier ID</th>
                            <th> Email</th>
                            <th>Contact Details</th>
                            <th>Type</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {

        fetch_customer_data();

        function fetch_customer_data(query = '') {
            $.ajax({
                url: "{{ route('live_search.action') }}",
                method: 'GET',
                data: {query: query},
                dataType: 'json',
                success: function (data) {
                    $('tbody').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            })
        }

        $(document).on('keyup', '#search', function () {
            var query = $(this).val();
            fetch_customer_data(query);
        });
    });
</script>
@endsection