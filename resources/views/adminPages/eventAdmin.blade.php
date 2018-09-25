@extends('layout')

@section('content')

    <div class="container-fluid">

        <div class="col-12 row">
            <div class="col-3">
                <br>
                <br>
                <h3>List of Events</h3>
                <br>
                <?php
                $events = \App\Event::all();
                ?>

                <table class="col-12">
                    <tr>
                        <th>ID</th>
                        <th>Event Name</th>
                    </tr>

                    @foreach($events as $event)

                        <tr>
                            <td>{{$event->id}}</td>
                            <td>{{$event->title}}</td>
                        </tr>

                    @endforeach


                </table>
            </div>
            <div class="container col-9">
                <h1>Expenses and Incomes Event Wise</h1>
                <br>
                <canvas id="myChart"></canvas>
            </div>

            <?php
            $dates = array();
            $expenses = array();
            $revenues = array();
            $names = array();

            $sql = \App\Event::all();

            foreach ($sql as $row) {
                $names[] = $row['id'];
                $expenses[] = $row['act_expense'];
                $revenues[] = $row['act_income'];
                $dates[] = "" . date('M Y', strtotime($row['from_date']));
            }
            //    $day = date('d', strtotime($article->created_at));

            $dates = implode(",", $dates);
            $expenses = implode(",", $expenses);
            $revenues = implode(",", $revenues);
            $ids = implode(",", $names);


            ?>


            <script>
                myChart = document.getElementById('myChart').getContext('2d');
                var datas = {
                    datasets: [{
                        data: [<?php echo $revenues; ?>],
                        backgroundColor: 'rgba(169, 92, 115, 0.2)',
                        borderColor: "#a39",
                        // Changes this dataset to become a line
                        //type: 'line',
                        borderWidth: 5,
                        label: 'Income' // for legend
                    }, {
                        data: [<?php echo $expenses; ?>],
                        backgroundColor: 'transparent',
                        borderColor: "#39a",
                        borderWidth: 5,
                        label: 'Expense' // for legend
                    }],
                    labels: [
//                    'a' , 'b' , 'c' , 'd' , 'e' , 'f'
                        <?php
                        //                    dd($names);
                        echo $ids;
                        ?>
                    ]
                };

                massPopChart = new Chart(myChart, {

                        type: 'bar',
                        data: datas,
                        options: {
                            legend: {
                                display: true,
                                position: 'left',
                                labels: {
                                    fontColor: 'black'
                                    //fontColor: 'rgb(255, 99, 132)'
                                }
                            },
                            tooltips: {
                                mode: 'index'
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }],
                                xAxes: [{
                                    ticks: {
                                        autoskip: true,
                                        maxTicksLimit: 6
                                    }
                                }]
                            }
                        }
                    }
                );


            </script>

        </div>

        <div class="col-12 row container-fluid" style="margin: 5%">


            <?php
            $count = 1;
            //            $sql = mysqli_query($db_conx, "SELECT * FROM chart_data ORDER BY budget_date");

            $sql1 = \App\Event::orderBy('from_date')->get();

            foreach($sql1 as $row ){
            $count = $count;
            $id = $row['id'];
            $expense = $row['act_expense'];
            $revenue = $row['act_income'];
            $name = $row['title'];
            $date = date('M, Y', strtotime($row['from_date']));

            //            "".date('M Y', strtotime( $row['from_date']));
            ?>

                <div style="height:360px; width:360px; margin-top:60px; float:left;">
                    <h3 align="center"><?php echo $name; ?></h3>

                    <canvas id="Chart_<?php echo $id; ?>" ></canvas>
                </div>

            <script>

                var ctx = document.getElementById("Chart_<?php echo $id; ?>");
                //for bar, line

                    <?php if($count % 2 == 0){ ?>
                var data = {
                        datasets: [{
                            data: [<?php echo $revenue; ?>],
                            backgroundColor: ["#455C73"],
                            label: 'Revenue' // for legend
                        }, {
                            data: [<?php echo $expense; ?>],
                            backgroundColor: ["#9B59B6"],
                            label: 'Expense' // for legend
                        }],
                        labels: ["<?php echo $name; ?>"]
                    };
                <?php }else{ ?>
                //for pie, doughnut
                var data = {
                    datasets: [{
                        data: [<?php echo $revenue; ?>, <?php echo $expense; ?>],
                        backgroundColor: ["#455C73", "#9B59B6"]
                    }],
                    labels: ["Revenue", "Expense"]
                };
                    <?php }?>

                var myChart = new Chart(ctx, {
                        data: data,
                        type: '<?php if ($count % 2 == 0) {
                            echo 'bar';
                        } else {
                            echo 'pie';
                        }?>',

                        options: {
                            legend: {
                                display: true,
                                position: 'left',
                                labels: {
                                    fontColor: 'black'
                                    //fontColor: 'rgb(255, 99, 132)'
                                }
                            },
                            labels: {
                                fontColor: 'rgb(255, 99, 132)'
                            }
                            <?php if($count % 2 == 0){ ?>
                            ,
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }],
                                xAxes: [{
                                    ticks: {
                                        autoskip: true,
                                        maxTicksLimit: 6
                                    }
                                }]
                            }

                            <?php } ?>

                        }
                    });

            </script>

            <?php } ?>
        </div>

    </div>
    </div>
@endsection