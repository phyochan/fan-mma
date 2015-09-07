<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Myanmar Music Art</title>

    <!-- Bootstrap CSS -->
    <link href="{{asset('admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{asset('admin/css/bootstrap-theme.css')}}" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{asset('admin/css/elegant-icons-style.css')}}" rel="stylesheet" />

    <link href="{{asset('admin/css/font-awesome.min.css')}}" rel="stylesheet" />
    <!-- full calendar css-->



    <link href="{{asset('admin/css/style.css')}}" rel="stylesheet" />

    <link href="{{asset('admin/css/style-responsive.css')}}" rel="stylesheet" />


    <script src="{{asset('js/my.js')}}"></script>









</head>

<body>
<!-- container section start -->
<section id="container" class="">


    <header class="header dark-bg">
        <div class="toggle-nav">
            <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
        </div>

        <!--logo start-->
        <a href="index.html" class="logo">Myanmar Music Art Admin Panel</a>
        <!--logo end-->



    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu">
                <li class="active">
                    <a class="" href="{{URL::to('/backend/admin')}}">
                        <i class="icon_house_alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="active">
                    <a class="" href="{{URL::to('/backend/admin/request')}}">
                        <i class="icon_gift"></i>
                        <span>Request Songs</span>
                    </a>
                </li>

                <li class="active">
                    <a class="" href="{{URL::to('/backend/admin/ugsongs/request')}}">
                        <i class="icon_upload"></i>
                        <span>UG Songs</span>
                    </a>
                </li>




            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->

    @yield('content')


    <!--main content end-->
</section>
<!-- container section start -->



</body>
</html>
