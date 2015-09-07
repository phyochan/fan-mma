@extends('fan.index')


@section('form')


    <script type="text/javascript">
        $(document).ready(function (){
            $("#loading-div-background").css({ opacity: 1.0 });
        });

        function ShowProgressAnimation(){
            $("#loading-div-background").show();
        }
    </script>

    <div class="register-container container">


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

            @if (Session::has('sucess'))
                <div class="alert alert-info">{{ Session::get('sucess') }}</div>
            @endif

        <div class="row">
            <div class="iphone span5">
                <script type='text/javascript' src='//eclkmpbn.com/adServe/banners?tid=58714_92890_0'></script>
            </div>

            <script type='text/javascript' src='//eclkmpbn.com/adServe/banners?tid=58714_92890_1&type=shadowbox&size=300x250'></script>

            <div class="register span6">
                <form action="{{url('/request')}}" method="post">
                    <h2>Request<span class="teal"><strong> Song</strong></span></h2>

                    <input type="hidden" name="_token" value="{{ csrf_token()}}">

                    <label for="name">Your Name</label>

                    <input type="text" id="name" name="name" placeholder="Enter your name..." value="{{old('name')}}">

                    <label for="songname">Song Title</label>

                    <input type="text" id="songname" name="songname" placeholder="Enter your request song name..." value="{{old('songname')}}">

                    <label for="songname">Singer Name</label>

                    <input type="text" id="singer" name="singer" placeholder="Enter singer name..." value="{{old('singer')}}">

                    <label for="email">Your Email</label>

                    <input type="text" id="email" name="email" placeholder="Enter your email..." value="{{old('email')}}">


                    <button onclick="ShowProgressAnimation();" type="submit">Submit</button>


                </form>
            </div>
        </div>
    </div>

    <div id="loading-div-background">
        <div id="loading-div" class="ui-corner-all">
            <img style="height:32px;width:32px;margin:30px;" src="{{asset('form/img/please_wait.gif')}}" alt="Loading.."/><br>PROCESSING. PLEASE WAIT...
        </div>
    </div>

@endsection