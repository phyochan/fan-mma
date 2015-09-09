
@extends('admin.index')

@section('content')





    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-mail-forward"></i> Send Email</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{URL::to('backend/admin')}}">Home</a></li>
                        <li><i class="fa fa-mail-forward"></i>Send Email</li>
                    </ol>
                </div>
            </div>



            <div class="container">

                <div class="row">

                    <div class="col-md-4 col-md-offset-4">



                        <form method="POST"  action="{{url('/backend/admin/email',$request -> id)}}"  accept-charset="UTF-8">





                        <div class="form-group">

                                <label for="comment">Email Address</label>
                                <input type="text" class="form-control"  name="email" value="{{$request -> email}}">

                            </div>

                            <div class="form-group">

                                <label for="comment">Music Link</label>
                                <input type="text" class="form-control"  name="music">

                            </div>

                        <br>

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <button onclick="return Confirm('Are you sure you went to send mail ?')" class="btn btn-success">Submit</button>



                        </form>

                        <br>


                            <p class="text-danger text-center lead">Music Link မွာ</p>

                        <p class="text-danger text-center lead">Myanmar Music Art Main Site တြင္တင္ထားေသာ Link ထည့္ေပးပါရန္</p>




                        </div>

                </div>


            </div>





            <!-- statics end -->


            <!-- project team & activity end -->

        </section>
    </section>

@endsection