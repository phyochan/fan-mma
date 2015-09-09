
@extends('admin.index')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-gift"></i> Request Songs</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{URL::to('backend/admin')}}">Home</a></li>
                        <li><i class="fa fa-gift"></i>Request Songs</li>
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
                    <th>Email</th>
                    <th>Approve Admin</th>

                    <th></th>
                    <th></th>
                    <th></th>


                </tr>


                </thead>

                <tbody>


                @foreach($requests as $request)

                    <tr>




                        <td>{{$request -> id}}</td>
                        <td>{{$request -> songname}}</td>
                        <td>{{$request -> name}}</td>
                        <td>{{$request -> singer}}</td>
                        <td>{{$request -> email}}</td>
                        <td>{{$request -> approve}}</td>


                        @if($request -> approve == "")

                            <td>



                                <form method="POST" onclick = "return Confirm('Are you sure u went to approve ?')" action="{{url('/backend/admin/request/'.$request -> id)}}" enctype="multipart/form-data">

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

                                <a href="{{url('/backend/admin/email',$request -> id)}}" class="btn btn-info">Send Email</a>



                            </td>


                        @endif





                            @if($request -> approve == Auth::user() -> nickname)

                            <td>

                            <form method="POST" onclick="return Confirm('Are you sure you went to delete ?')" action="{{url('/backend/admin/request/delete/'.$request -> id)}}"  accept-charset="UTF-8">
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

            {!! $requests->render() !!}

                <!-- statics end -->


            <!-- project team & activity end -->

        </section>
    </section>

@endsection