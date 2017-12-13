<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Stock management') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/amaze.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.1.12.0.css') }}" rel="stylesheet">
    <link href="{{ asset('css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fotorama.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
     <div class="wrapper">
        <div class="sidebar" data-background-color="brown" data-active-color="danger">
        <!--
            Tip 1: you can change the color of the sidebar's background using: data-background-color="white | brown"
            Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
        -->
            <div class="logo">
                <a href="" class="simple-text">
                    <span>Stock management</span>
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="" class="simple-text">
                    MP
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="">
                        <a data-toggle="collapse" href="#products" class="collapsed" aria-expanded="false">
                            <i class="fa fa-product-hunt"></i>
                            <p>Products
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="products" role="navigation" aria-expanded="false" style="height: 0px;">
                            <ul class="nav">
                                <li>
                                    <a href=""><i class="fa fa-list"></i> products list</a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-trash"></i> trashed products</a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-plus"></i> Add new </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="">
                        <a data-toggle="collapse" href="#categories" class="collapsed" aria-expanded="false">
                            <i class="fa fa-tag"></i>
                            <p>Category
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="categories" role="navigation" aria-expanded="false" style="height: 0px;">
                            <ul class="nav">
                                <li>
                                    <a href=""><i class="fa fa-plus"></i> cat list</a>
                                </li>
                                <li>
                                    <a href=""><i class="fa fa-plus"></i>sub cat list</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="">
                        <a href="">
                            <i class="fa fa-tag"></i>
                            <p>Packeges</p>
                        </a>
                    </li>
                    <li class="">
                        <a href="">
                            <i class="fa fa-cubes"></i>
                            <p>Providers</p>
                        </a>
                    </li>
                    
                    <li class="">
                        <a href="">
                            <i class="fa fa-users"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    
                    <li class="">
                        <a href="#">
                            <i class="fa fa-download"></i>
                            <p>Data</p>
                        </a>
                    </li>
                    
                </ul>
                <div class="copyright-section" style="display: none;">
                    <p class="copyright">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="#">Imad AKEL.</a>
                        <span>Version : 1.1</span>
                    </p>
                </div>
            </div>
        </div> <!-- endside bar -->
        <div class="main-panel">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="fa fa-arrow-left"></i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"> <i class="fa fa-home"></i> Home </a>
                    </div> 
                    <div class="collapse navbar-collapse">

                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-language"></i>
                                    <p class="hidden-lg hidden-md">{{ Config::get('languages')[App::getLocale()] }} </p>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach (Config::get('languages') as $lang => $language)
                                        @if ($lang != App::getLocale())
                                            <li>
                                                <a href="{{ route('lang.switch', $lang) }}">{{$language}}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>

                            <li class="dropdown">
                                <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-user"></i>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i class="fa fa-user fw"></i>  
                                            @guest
                                                Anonymous
                                            @else
                                                Logout
                                            @endguest
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                    <li>
                                        <a href=""><i class="fa fa-edit fw"></i>  Change password</a>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="separator hidden-lg hidden-md"></li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                @yield('content')
            </div>
            <footer class="footer" style="display: none">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="#">Digital Works.</a>
                    </p>
                </div>
            </footer>
        </div>

    </div>

    <!-- Scripts -->
    
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.1.12.0.js') }}"></script>
    <script src="{{ asset('js/material.min.js') }}"></script>
    <script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.datatables.js') }}"></script>
    <script src="{{ asset('js/amaze.js') }}"></script>
    <script src="{{ asset('js/fotorama.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>
