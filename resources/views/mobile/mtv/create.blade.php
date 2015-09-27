
@extends('admin.index')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-mobile"></i> Mobile Api - Add New MTV</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{URL::to('backend/admin')}}">Home</a></li>
                        <li><i class="fa fa-mobile"></i>Mobile Api - Add New MTV</li>
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


                        <form action="{{url('/backend/admin/mobile/mtv/')}}" enctype="multipart/form-data" method="POST" >

                            <input type="hidden" name="_token" value="{{ csrf_token()}}">

                            <div class="form-group">

                                <label>Song Title</label>
                                <input type="text" class="form-control"  name="songname" required placeholder="Enter Song Name" >

                            </div>


                            <div class="form-group">

                                <label>Singer Name</label>
                                <input type="text" class="form-control"  name="singer" required placeholder="Enter Singer Name" >

                            </div>



                            <div class="form-group">

                                <label>Youtube Video ID</label>
                                <input type="text" class="form-control"  name="youtubeid" required placeholder="Enter Youtube Video ID" >

                            </div>





                            <br><br>

                            <div class="form-group col-md-offset-4">

                                <button class="btn btn-success btn-lg center-block">Submit</button>


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