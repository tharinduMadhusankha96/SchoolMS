@extends('layout')

@section('content')
    <div class="container-fluid">
        <div class="container">
            <canvas id="myChart"></canvas>
        </div>

        <script>
            myChart = document.getElementById('myChart').getContext('2d');
            massPopChart = new Chart(myChart , {

                type:'pie',
                data:{
                    labels:['A' , 'B' , 'C' , 'D'],
                    datasets:[{
                        label:'Pups',
                        data:[
                            5,4,3,4, 0 ,10
                        ],
                        backgroundColor:[
                            'red',
                            'lightgreen',
                            'yellow'
                        ],
                        borderWidth:2,
                        borderColor:'blue',
                        hoverBorderWidth:4,
                        hoverBorderColor:'black',
                    }]
                },
                option:[]

            });


        </script>
    </div>
@endsection