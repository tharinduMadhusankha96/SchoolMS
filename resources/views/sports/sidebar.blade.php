{{--<button> <i class="fa fa fa-th-large" >-india-7615949353 </i></button>--}}
@if(auth()->user())
    @if(auth()->user()->role_id == 2)
        @include('sports.adminsidebar');
    @endif
    @if(Auth()->user()->role_id == 2)
        <div class="btn-block" style="padding-top: 15px">
            <button class="btn btn-outline-info" style="width: 100%; min-height: 60px ; "><a href="/Sport/mysports"
                                                                                             style="color: whitesmoke">My
                    Events</a></button>
        </div>
    @endif
@endif

{{--@include('sports.adminsidebar');--}}

<div class="sidebar left container-fluid " style="width: 100%">

    <?php
    $Allsports = \App\Sport::all();
    $Malesports = \App\Sport::where('gender' , "Male")->get();
    $Femalesports = \App\Sport::where('gender' , "Female")->get();
    $Bothsports = \App\Sport::where('gender' , "Both")->get();
    ?>

    <ul class="list-sidebar bg-defoult">

        {{--<li><a href="#"><i class="fa fa-dice"></i> <span class="nav-label">All sports</span></a></li>--}}
        <li><a href="#" data-toggle="collapse" data-target="#products" class="collapsed active"> <i
                        class="fa fa-dice"></i> <span class="nav-label">All Sports</span> <span
                        class="fa fa-chevron-left pull-ri`ght"></span> </a>
            <ul class="sub-menu collapse" id="products">
                @foreach($Allsports as $sport)
                    <li class="text-white"><a href="#">{{$sport->title}}</a></li>
                @endforeach
                {{--<li><a href="#">Running 100 x 4</a></li>--}}
                {{--<li><a href="#">Running 200</a></li>--}}
                {{--<li><a href="#">Running 1000m</a></li>--}}
                {{--<li><a href="#">Javelin</a></li>--}}
                {{--<li><a href="#">High Jump</a></li>--}}
                {{--<li><a href="#">Long Jump</a></li>--}}
            </ul>
        </li>

        <li><a href="#" data-toggle="collapse" data-target="#products" class="collapsed active"> <i
                        class="fa fa-walking"></i> <span class="nav-label">Sports(Boys)</span> <span
                        class="fa fa-chevron-left pull-right"></span> </a>
            <?php
                $Allsports = \App\Sport::all();
                $Malesports = \App\Sport::where('gender' , "Male")->get();
                $Femalesports = \App\Sport::where('gender' , "Female")->get();
                $Bothsports = \App\Sport::where('gender' , "Both")->get();
            ?>
            <ul class="sub-menu collapse" id="products">
                @foreach($Malesports as $sport)
                    <li class="text-white"><a href="#">{{$sport->title}}</a></li>
                @endforeach
                {{--<li><a href="#">Running 100 x 4</a></li>--}}
                {{--<li><a href="#">Running 200</a></li>--}}
                {{--<li><a href="#">Running 1000m</a></li>--}}
                {{--<li><a href="#">Javelin</a></li>--}}
                {{--<li><a href="#">High Jump</a></li>--}}
                {{--<li><a href="#">Long Jump</a></li>--}}
            </ul>
        </li>
        {{--<li> <a href="#"><i class="fa fa-laptop"></i> <span class="nav-label">Grid options</span></a> </li>--}}
        <li><a href="#" data-toggle="collapse" data-target="#tables" class="collapsed active"><i
                        class="fa fa-female"></i> <span class="nav-label">Sports(Girls) </span><span
                        class="fa fa-chevron-left pull-right"></span></a>
            <ul class="sub-menu collapse" id="tables">
                {{--<li class="active"><a href="#">Running 100M</a></li>--}}
                @foreach($Femalesports as $sport)
                    <li class="text-white"><a href="#">{{$sport->title}}</a></li>
                @endforeach
                {{--<li><a href="#">Running 100 x 4</a></li>--}}
                {{--<li><a href="#">Running 200</a></li>--}}
                {{--<li><a href="#">Running 1000m</a></li>--}}
                {{--<li><a href="#">Javelin</a></li>--}}
                {{--<li><a href="#">High Jump</a></li>--}}
                {{--<li><a href="#">Long Jump</a></li>--}}
            </ul>
        </li>
        <li><a href="#" data-toggle="collapse" data-target="#e-commerce" class="collapsed active"><i
                        class="fa fa-trophy"></i> <span class="nav-label">Sports for All</span><span
                        class="fa fa-chevron-left pull-right"></span></a>
            <ul class="sub-menu collapse" id="e-commerce">
                @foreach($Bothsports as $sport)
                    <li class=""><a href="#">{{$sport->title}}</a></li>
                @endforeach
                {{--<li class="active"><a href="#">Cricket (Boys Only) </a></li>--}}
                {{--<li><a href="#">Basket Ball</a></li>--}}
                {{--<li><a href="#">Football (Boys Only) </a></li>--}}
                {{--<li><a href="#">Hockey</a></li>--}}
                {{--<li><a href="#">Karate</a></li>--}}
                {{--<li><a href="#">Badminton</a></li>--}}
                {{--<li><a href="#">Netball (Girls Only) </a></li>--}}
            </ul>
        </li>


    </ul>
</div>




<script>
    $(document).ready(function () {
        $('button').click(function () {
            $('.sidebar').toggleClass('fliph');
        });


    });
</script>