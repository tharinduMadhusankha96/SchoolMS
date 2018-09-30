<div id="app">
    <div class="order-md-12 container">

        <nav >
            <div class="row text-center logogif">

                <img src="{{asset('images/logogif.gif')}}" class="img-responsive img-circle logogif" style="width:15%;height:40%">

                <H1 style="min-width: 1000px; text-align: center; color: white"> NWP/ Wickaramashila Central College <br> Giriulla </H1>

            </div>
        </nav>

    </div>
    <nav class="navbar navbar-expand-md navbar-light navbar-inverse bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{--<img src="{{asset('images/wccgif.gif')}}" height="50px" width="100px">--}}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto" >
                    <li class="nav-item">
                        <a class="nav-link active " style="color: white;font-family: Times New Roman; width:5%" href="#" >Home</a>
                    </li>
                    <li class="nav-item  col-md-2">
                        <a class="nav-link" style="color: white;font-family: Times New Roman; width: inherit" href="#">About WCC</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " style="color: white;font-family: Times New Roman; width: inherit;" href="#">Student & Parents</a>
                    </li>
                    <li class="nav-item col-md-1">
                        <a class="nav-link " style="color: white;font-family: Times New Roman" href="#">Staff</a>
                    </li>

                    <li class="nav-item" >

                    <li class="nav-item dropdown col-md-2">
                        <a class="nav-link dropdown-toggle"  style="color: white; width: 150px" href="/Events" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Academic</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                            <a class="dropdown-item" href="#">Acadamic</a>
                            <a class="dropdown-item" href="#">Non-Academic</a>
                        </div>
                    </li>

                    <li class="nav-item  col-md-">
                        <a class="nav-link " style="color: white;font-family: Times New Roman; width: inherit" href="#">Library</a>
                    </li>

                    <li class="nav-item dropdown col-md-2">
                        <a class="nav-link dropdown-toggle"  style="color: white; width: 150px" href="/Events" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Events</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown03">
                            <a class="dropdown-item" href="/Event">Events</a>
                            <a class="dropdown-item" href="#">Sports</a>
                            <li class="dropdown-item" href="#">Clubs & Societies</li>
                        </ul>
                    </li>

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" style="color: white" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: white" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" style="color: white" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}"  method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>


    <script>
        $(document).ready(function(){
            $('.dropdown-submenu a.test').on("click", function(e){
                $(this).next('ul').toggle();
                e.stopPropagation();
                e.preventDefault();
            });
        });
    </script>