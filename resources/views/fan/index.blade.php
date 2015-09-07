
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Myanmar Music Art</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- CSS -->

    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oleo+Script:400,700'>
    <link rel="stylesheet" href="{{asset('form/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet" href="{{asset('form/css/style.css')}}">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">


    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->



</head>

<body>

<div class="header">
    <div class="container">
        <div class="row">
            <div class="logo span4">
                <h1><a href="">Myanmar Music Art  <span class="teal"><i class="fa fa-music"></i> </span></a></h1>
            </div>
            <div class="links span8">
                <a class="home" href="{{URL::to('/ug/send')}}" rel="tooltip" data-placement="bottom" data-original-title="Home"></a>
                <a class="blog" href="{{URL::to('/request')}}" rel="tooltip" data-placement="bottom" data-original-title="Blog"></a>
            </div>
        </div>
    </div>
</div>


@yield('form')

<!-- Javascript -->
<script src="{{asset('form/js/jquery-1.8.2.min.js')}}"></script>
<script src="{{asset('form/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('form/js/jquery.backstretch.min.js')}}"></script>
<script src="{{asset('form/js/scripts.js')}}"></script>



</body>

</html>

