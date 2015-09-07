<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Please Login</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link href="{{asset('css/style.css')}}" rel="stylesheet">

        <script src="{{asset('js/bootstrap.min.js')}}"></script>
	</head>
	<body>
<!--login modal-->







<form action="{{url('/login')}}" method="post">

<input type="hidden" name="_token" value="{{ csrf_token()}}">


<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">

    <br/><br/>

    <p class="text-center text-primary myfontsize">Myanmar Music Art ရဲ႕Mobile App မ်ား အတြက္</p>
    <p class="text-center text-primary myfontsize">Author မ်ား၀င္ေရာက္ရန္</p>


    <br/><br/>


  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Myanmar Music Art</h1>

          @if (count($errors) > 0)
          						<div class="alert alert-danger">
          							<strong>Whoops!</strong> There were some problems with your input.<br><br>
          							<ul>
          								@foreach ($errors->all() as $error)
          									<li>{{ $error }}</li>
          								@endforeach
          							</ul>
          						</div>
          					@endif


      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block">
            <div class="form-group">
              <input type="email" name = 'email' class="form-control input-lg" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" name = 'password' class="form-control input-lg" placeholder="Password">
            </div>
            <div class="form-group">
              <button class="btn btn-success btn-lg btn-block">Submit</button>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">

              <p class="text-center text-info myfontsize">Power By MMSD</p>



		  </div>
      </div>
  </div>
  </div>
</div>

</form>
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>



</html>

