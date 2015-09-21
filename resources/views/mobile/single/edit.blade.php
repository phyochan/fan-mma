
@extends('admin.index')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-mobile"></i> Mobile Api - Edit Songs</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{URL::to('backend/admin')}}">Home</a></li>
                        <li><i class="fa fa-mobile"></i>Mobile Api - Edit Songs</li>
                    </ol>
                </div>
            </div>


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

            <div class="container">

                <div class="row">

                    <div class="col-md-4 col-md-offset-4">


                        <form action="{{url('/backend/admin/mobile/songs',$singlemusic -> id)}}" method="POST" enctype="multipart/form-data">

                            <input type="hidden" name="_token" value="{{ csrf_token()}}">

                            <div class="form-group">

                                <label>Song Title</label>
                                <input type="text" class="form-control"  name="songname" required placeholder="Enter Song Name" value="{{$singlemusic -> songtitle}}">

                            </div>


                            <div class="form-group">

                                <label>Singer Name</label>
                                <input type="text" class="form-control"  name="singer" required placeholder="Enter Singer Name" value="{{$singlemusic -> singer}}">

                            </div>

                            <div class="form-group">

                                <label>Photo Upload</label>
                                <input type="file" class="form-control"  name="photo"  accept="image/*" >

                            </div>

                         {{--


                          <div class="form-group">

                                <label>Mp3 Link</label>

                                <input type="text" class="form-control" name="mp3" required placeholder="Enter mp3 link" value="{{$singlemusic -> mp3}}">


                            </div>

                            --}}

                            <div class="form-group">


                                <label>Mp3 သီခ်င္း</label>

                                <input  type="file" class="form-control" name="mp3"   accept=".mp3">

                            </div>



                            <div class="form-group">

                                <label>Song Language</label>

                                <select class="form-control" name="language">
                                    <option value="myanmar">Myanmar</option>
                                    <option value="english">English</option>
                                    <option value="korea">Korea</option>

                                </select>


                            </div>


                            <div class="form-group">

                                <label>Song Categories</label>

                                <select class="form-control" name="categories" >
                                    <option value="Pop">Pop</option>
                                    <option value="Hip Hop">Hip Hop</option>
                                    <option value="R & B">R & B</option>
                                    <option value="Rock">Rock</option>
                                    <option value="Electro">Electro</option>
                                    <option value="Dubstep">Dubstep</option>

                                </select>


                            </div>

                            <div class="form-group">


                                <textarea class="form-control" required rows="8" placeholder="Enter Song Content" name="content">{{$singlemusic -> content}}</textarea>


                            </div>



                            <br><br>

                            <div class="form-group col-md-offset-4">

                                <button onclick="return Confirm('Are you sure ?')" class="btn btn-success btn-lg center-block">Submit</button>


                            </div>






                        </form>


                    </div>
                </div>

            </div>

            <!-- statics end -->


            <!-- project team & activity end -->

        </section>
    </section>

@endsection