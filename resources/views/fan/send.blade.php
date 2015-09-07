@extends('fan.index')

@section('form')


    <script src="{{asset('js/my.js')}}"></script>

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



            @if(Session::has('error'))
                <p class="errors">{!! Session::get('error') !!}</p>
            @endif

            @include('flash::message')


            <div class="row">
            <div class="iphone span5">
                <script type='text/javascript' src='//eclkmpbn.com/adServe/banners?tid=58714_92890_0'></script>
            </div>

                <script type='text/javascript' src='//eclkmpbn.com/adServe/banners?tid=58714_92890_1&type=shadowbox&size=300x250'></script>


            <div class="register span6">

                <form action="{{url('/ug/send')}}" method="post" enctype="multipart/form-data">


                    <h2>Send<span class="teal"><strong> UG Song</strong></span></h2>

                    <input type="hidden" name="_token" value="{{ csrf_token()}}">

                    <label for="name">Your Name</label>

                    <input type="text" required id="name" name="name" placeholder="Enter your name..." value="{{old('name')}}">

                    <label for="songname">Song Title</label>

                    <input type="text" required id="songname" name="songname" placeholder="Enter your request song name..." value="{{old('songname')}}">

                    <label for="mp3">Mp3 Upload</label>

                    <input  type="file" required name="mp3" id="mp3" accept=".mp3" >

                    <br>

                    <br>

                    <label for="songname">Singer Name</label>

                    <input type="text" required id="singer" name="singer" placeholder="Enter singer name..." value="{{old('singer')}}">

                    <label for="photo">Photo Upload</label>

                    <input  type="file"  required name="image" id="photo" accept="image/*" onchange="PreviewImage('photo','uploadPreview');">

                    <img  class="col-md-offset-4 img-thumbnail" id="uploadPreview" style="width: 300px; height: 300px; display: none" />

                    <br>
                    <br>

                    <label for="email">Your Email</label>

                    <input type="text" required id="email" name="email" placeholder="Enter your email..." value="{{old('email')}}">


                    <button type="submit">Send</button>




                </form>
            </div>
        </div>
    </div>

    <script src="{{asset('js/jquery.min.js')}}"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <script>
        $('#flash-overlay-modal').modal();
    </script>


@endsection

