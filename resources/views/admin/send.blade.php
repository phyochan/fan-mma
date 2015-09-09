
@extends('admin.index')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-gift"></i> UG Songs</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{URL::to('backend/admin')}}">Home</a></li>
                        <li><i class="fa fa-gift"></i>Underground Songs</li>
                    </ol>
                </div>
            </div>


            @include('flash::message')


            <table class="table table-bordered">

                <thead>

                <tr>

                    <th>ID</th>
                    <th>Song Title</th>
                    <th>UserName</th>
                    <th>Singer</th>
                    <th>Photo</th>
                    <th>Mp3 Download</th>
                    <th>Email</th>
                    <th>Approve Admin</th>

                    <th></th>
                    <th></th>
                    <th></th>


                </tr>


                </thead>

                <tbody>


                @foreach($sends as $send)

                    <tr>




                        <td>{{$send -> id}}</td>
                        <td>{{$send -> songname}}</td>
                        <td>{{$send -> name}}</td>
                        <td>{{$send -> singer}}</td>
                        <td>

                            <a href="{{$send -> image}}" target="_blank" class="btn btn-info">View</a>

                        </td>

                        <td>

                            <a href="{{$send -> mp3}}" target="_blank" download="" class="btn btn-primary">Download</a>

                        </td>


                        <td>{{$send -> email}}</td>
                        <td>{{$send -> approve}}</td>


                        @if($send -> approve == "")

                        <td>




                            <form method="POST" onclick = "return Confirm('Are you sure u went to approve ?')" action="{{url('/backend/admin/ugsongs/request/'.$send -> id)}}" enctype="multipart/form-data">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input class="btn btn-success" type="submit" value="Approve">
                            </form>


                        </td>

                         <td>  <a class="btn btn-info disabled" href="">UnAvailable</a></td>

                        @else

                            <td>

                                <button class="btn btn-primary disabled" type="button">Approved</button>

                            </td>

                            <td>

                                <a href="{{url('/backend/admin/ug/email',$send-> id)}}" class="btn btn-info">Send Email</a>



                            </td>


                        @endif

                        @if($send -> approve == Auth::user() -> nickname)

                            <td>

                                <form method="POST" onclick="return Confirm('Are you sure you went to delete ?')" action="{{url('/backend/admin/ugsongs/request/delete/'.$send -> id)}}"  accept-charset="UTF-8">
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input class="btn btn-danger" type="submit" value="Delete"  >
                                </form>

                            </td>

                        @else

                            <td>  <a class="btn btn-info disabled" href="">UnAvailable</a></td>


                        @endif


                    </tr>


                @endforeach


                </tbody>


            </table>

            {!! $sends->render() !!}

                    <!-- statics end -->


            <!-- project team & activity end -->

        </section>
    </section>

    <script src="{{asset('js/jquery.min.js')}}"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <script>
        $('#flash-overlay-modal').modal();
    </script>

@endsection