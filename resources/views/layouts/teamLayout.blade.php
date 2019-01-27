<!DOCTYPE html>
<html>
<head>
<title>@yield('title')</title>
<link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('public/css/style.css')}}">
<script src="{{ asset('public/js/bootstrap.min.js')}}"></script>
<script src="{{ asset('public/js/jquery.min.js')}}"></script>
<script src="{{ asset('public/js/custom.js')}}"></script>
</head>
<body>

<div id="wrapper">
    <div class="overlay"></div>
    <section class="our-webcoderskull padding-lg">
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                       Deepak
                    </a>
                </li>
                <li>
                    <a href="{{url('/team')}}">Team</a>
                </li>
                <li>
                    <a href="{{url('add-new')}}">Add New</a>
                </li>
                <li>
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
                <span class="hamb-middle"></span>
                <span class="hamb-bottom"></span>
            </button>
        @yield('content') 
        </div>
    </section>
        <!-- /#page-content-wrapper -->
</div>
    <!-- /#wrapper -->
</body>
</html>


