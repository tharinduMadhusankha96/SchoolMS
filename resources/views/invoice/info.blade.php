@extends('include.include')
@section('content')
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #D0D3D4;
        }

        * {
            box-sizing: border-box;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
            background-color: white;
        }

        /* Full-width input fields */
        input[type=email], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        input[type=tel], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        input[type=number], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }
        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        /* Overwrite default styles of hr */
        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for the submit button */
        .registerbtn {
            background-color: #935116;
            color: white;
            padding: 16px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        .registerbtn:hover {
            opacity: 1;
        }

        /* Add a blue text color to links */
        a {
            color: dodgerblue;
        }

        /* Set a grey background color and center the text of the "sign in" section */
        .signin {
            background-color: #f1f1f1;
            text-align: center;
        }
        #customers {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even){background-color: #f2f2f2;}

        #customers tr:hover {background-color: #ddd;}

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color:#CD6155  ;
            color: white;
        }

    </style>
    <body>
    <div class="container">
        <section class="panel">
            <div class="panel panel-footer">
                <header class="panel panel-default">
                    <h3>Canteen Sales</h3>
                </header>
            </div>
            <div class="panel panel-footer">
                {!!Form::open(array('route'=>'insert','id'=>'frmsave','method'=>'post'))!!}
                <div class="row">
                    <div class="col-lg-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6">
                        <div class="form-group">
                            <input type="text" name="phone" class="form-control" placeholder="Phone Number" required>
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-2">
                        <div class="form-group">
                            {!!Form::submit('Save',array('class'=>'btn btn-primary'))!!}
                        </div>
                    </div>
                    <div class="col-lg-12 col-sm-12">
                        <table id="customers">
                            <thead>

                            <th>Product Name</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Dis</th>
                            <th>Amount</th>
                            <th><a href="#" class="addRow"><i class="glyphicon glyphicon-plus"></i></a></th>
                            </thead>
                            <tbody>
                            <tr>

                                <td>
                                    <select name="productname[]" class="form-control productname">
                                        <option value="0" selected="true" disabled="true">Select Product</option>
                                        @foreach($CanProduct as $key=>$v)
                                            <option value="{!!$key!!}">{!!$v!!}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td><input type="text" name="qty[]" class="form-control qty" required></td>
                                <td><input type="text" name="price[]" class="form-control price" required></td>
                                <td><input type="text" name="dis[]" class="form-control dis"></td>
                                <td><input type="text" name="amount[]" class="form-control amount" readonly="true"></td>
                                <td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>

                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                                <td style="border:none"></td>
                                <td style="border:none"></td>
                                <td style="border:none"></td>
                                <td><b>Total</b></td>
                                <td><b class="total"></b></td>
                                <td></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!---->
                </div>
                <a href="{{asset('canteen_sales')}}" class="button button2">Back</a>
                {!!Form::hidden('_token',csrf_token())!!}
                {!!Form::close()!!}
            </div>
        </section>
    </div>
    </body>
    <script type="text/javascript">
        $('tbody').delegate('.productname','change',function(){
            var tr =$(this).parent().parent();
            var id=tr.find('.productname').val();
            var dataId={'id':id};
            $.ajax({
                type :'GET',
                url :'{!!URL::route('findPrice')!!}',
                dataType :'json',
                data : dataId,
                success:function(data){
                    tr.find('.price').val(data.price);
                }


            });
        });
        $('tbody').delegate('.productname','change',function(){
            var tr =$(this).parent().parent();
            tr.find('.qty').focus();
        });
        $('tbody').delegate('.qty,.price,.dis','keyup',function(){
            var tr =$(this).parent().parent();
            var qty = tr.find('.qty').val();
            var price = tr.find('.price').val();
            var dis = tr.find('.dis').val();
            var amount= (qty*price)- (qty*price*dis)/100;
            tr.find('.amount').val(amount);
            total();
        });
        $('.addRow').on('click',function(){
            addRow();
        });
        findRowNumOnly('.qty');
        findRowNum('.price');
        findRowNumOnly('.dis');
        numberOnly('.phone');

        function total(){
            var total=0;
            $('.amount').each(function(i,e){
                var amount =$(this).val()-0;
                total=total+amount;
            });
            $('.total').html("Rs"+total);
        }
        function addRow(){
            var tr='<tr>'+
                '<td>'+
                '<select name="productname[]" class="form-control productname">'+
                '<option value="0" selected="true" disabled="true">Select Product</option>'+
                '@foreach($CanProduct as $key=>$v)'+
                '<option value="{!!$key!!}">{!!$v!!}</option>'+
                '@endforeach'+
                '</select>'+
                '</td>'+
                '<td><input type="text" name="qty[]" class="form-control qty"></td>'+
                '<td><input type="text" name="price[]" class="form-control price"></td>'+
                '<td><input type="text" name="dis[]" class="form-control dis"></td>'+
                '<td><input type="text" name="amount[]" class="form-control amount" readonly="true"></td>'+
                '<td><a href="#" class="btn btn-danger remove"><i class="glyphicon glyphicon-remove"></i></a></td>'+
                '</tr>';

            $('tbody').append(tr);
        }
        function findRowNum(input){
            $('tbody').delegate(input,'keydown',function(){
                var tr=$(this).parent().parent();
                number(tr.find(input));
            });
        }
        function findRowNumOnly(input){
            $('tbody').delegate(input,'keydown',function(){
                var tr=$(this).parent().parent();
                numberOnly(tr.find(input));
            });
        }
        function number(input){
            $(input).keypress(function(evt){
                var theEvent =evt || window.event;
                var key = theEvent.keyCode || theEvent.which;
                key = string.fromCharCode(key);
                var regex = /[-\d\.]/;
                var objRegex=/^-?\d*[\.]?\d*$/;
                var val=$(evt.target).val();
                if(!regex.test(key) || !objRegex.test(val+key) ||
                    !theEvent.keyCode==46 || !theEvent.keyCode==8){
                    theEvent.returnValue =false;
                    if(theEvent.preventDefault) theEvent.preventDefault();
                }
            });
        }
        function numberOnly(input){
            $(input).keypress(function(evt){
                var e =event || evt;
                var charCode =e.which || e.keyCode;
                if(charCode >31 &&(charCode <48 || charCode>57))
                    return false;
                return true;
            });
        }
    </script>
@stop