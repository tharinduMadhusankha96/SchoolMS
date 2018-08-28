{{--<button> <i class="fa fa fa-th-large" >-india-7615949353 </i></button>--}}

<div class="sidebar left container-fluid" style="width: 100%">
    <ul class="list-sidebar bg-defoult">
        <!--<li class="nav-header "> <span> <img alt="image" class="img-circle" src="http://placehold.it/150x150"> </span>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
            <li><a href="#">Regular link</a></li>
            <li class="disabled"><a href="#">Disabled link</a></li>
            <li><a href="#">Another link</a></li>
          </ul> -->
        </li>
        {{--<li> <a href="#" data-toggle="collapse" data-target="#dashboard" class="collapsed active" > <i class="fa fa-th-large"></i> <span class="nav-label"> All Sports </span> <span class="fa fa-chevron-left pull-right"></span> </a>--}}
            {{--<ul class="sub-menu collapse" id="dashboard">--}}
                {{--<li class="active"><a href="#">CSS3 Animation</a></li>--}}
                {{--<li><a href="#">General</a></li>--}}
                {{--<li><a href="#">Buttons</a></li>--}}
                {{--<li><a href="#">Tabs & Accordions</a></li>--}}
                {{--<li><a href="#">Typography</a></li>--}}
                {{--<li><a href="#">FontAwesome</a></li>--}}
                {{--<li><a href="#">Slider</a></li>--}}
                {{--<li><a href="#">Panels</a></li>--}}
                {{--<li><a href="#">Widgets</a></li>--}}
                {{--<li><a href="#">Bootstrap Model</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
        <li> <a href="#"><i class="fa fa-dice"></i> <span class="nav-label">All sports</span></a> </li>

        <li> <a href="#" data-toggle="collapse" data-target="#products" class="collapsed active" > <i class="fa fa-walking"></i> <span class="nav-label">Athletics (Boys)</span> <span class="fa fa-chevron-left pull-right"></span> </a>
            <ul class="sub-menu collapse" id="products">
                <li class="active"><a href="#">Running 100M</a></li>
                <li><a href="#">Running 100 x 4</a></li>
                <li><a href="#">Running 200</a></li>
                <li><a href="#">Running 1000m</a></li>
                <li><a href="#">Javelin</a></li>
                <li><a href="#">High Jump</a></li>
                <li><a href="#">Long Jump</a></li>
            </ul>
        </li>
        {{--<li> <a href="#"><i class="fa fa-laptop"></i> <span class="nav-label">Grid options</span></a> </li>--}}
        <li> <a href="#" data-toggle="collapse" data-target="#tables" class="collapsed active" ><i class="fa fa-female"></i> <span class="nav-label">Athletics (Girls) </span><span class="fa fa-chevron-left pull-right"></span></a>
            <ul  class="sub-menu collapse" id="tables" >
                <li class="active"><a href="#">Running 100M</a></li>
                <li><a href="#">Running 100 x 4</a></li>
                <li><a href="#">Running 200</a></li>
                <li><a href="#">Running 1000m</a></li>
                <li><a href="#">Javelin</a></li>
                <li><a href="#">High Jump</a></li>
                <li><a href="#">Long Jump</a></li>
            </ul>
        </li>
        <li> <a href="#" data-toggle="collapse" data-target="#e-commerce" class="collapsed active" ><i class="fa fa-trophy"></i> <span class="nav-label">Other Sports</span><span class="fa fa-chevron-left pull-right"></span></a>
            <ul  class="sub-menu collapse" id="e-commerce" >
                <li class="active"><a href="#">Cricket (Boys Only) </a></li>
                <li><a href="#">Basket Ball</a></li>
                <li><a href="#">Football (Boys Only) </a></li>
                <li><a href="#">Hockey</a></li>
                <li><a href="#">Karate</a></li>
                <li><a href="#">Badminton</a></li>
                <li><a href="#">Netball (Girls Only) </a></li>
            </ul>
        </li>



    </ul>
</div>

<script>
    $(document).ready(function(){
        $('button').click(function(){
            $('.sidebar').toggleClass('fliph');
        });



    });
</script>