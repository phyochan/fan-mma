
@extends('admin.index')

@section('content')

    <section id="main-content">
        <section class="wrapper">
            <!--overview start-->
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header"><i class="fa fa-mobile"></i> Mobile Api</h3>
                    <ol class="breadcrumb">
                        <li><i class="fa fa-home"></i><a href="{{URL::to('backend/admin')}}">Home</a></li>
                        <li><i class="fa fa-mobile"></i>Mobile Api</li>
                    </ol>
                </div>
            </div>

            @include('flash::message')


            <a href="{{url('/backend/admin/mobile/songs/create')}}" class="btn btn-info">Add News Songs</a>

            <a href="{{url('/backend/admin/mobile/songs/all')}}" class="btn btn-info">View All</a>


            <br><br>


            <table class="table table-bordered">



                <thead>

                <tr>

                    <th>ID</th>
                    <th>Song Title</th>
                    <th>Author</th>
                    <th>Singer</th>
                    <th>Categories</th>
                    <th>Language</th>


                    <th></th>
                    <th></th>
                    <th></th>


                </tr>


                </thead>

                <tbody>

                @foreach($singlemusics as $singlemusic)



                    <tr>

                            <td>{{$singlemusic -> id}}</td>
                            <td>{{$singlemusic -> songtitle}}</td>
                            <td>{{$singlemusic -> author}}</td>
                            <td>{{$singlemusic -> singer}}</td>
                            <td>{{$singlemusic -> categories}}</td>
                            <td>{{$singlemusic -> language}}</td>

                            <td>

                                <a href="{{url('backend/admin/mobile/songs',$singlemusic -> id)}}" class="btn btn-primary">View</a>

                            </td>


                        @if($singlemusic -> author == \Auth::user() -> nickname || \Auth::user() -> nickname == "Phyo Chan")

                            <td>

                                <a href="{{url('backend/admin/mobile/songs/'.$singlemusic -> id.'/edit')}}" class="btn btn-info">Edit</a>

                            </td>

                        @else

                            <td>

                                <a href="" class="btn btn-info disabled">Unavailable</a>

                            </td>


                        @endif



                        @if($singlemusic -> author == Auth::user() -> nickname)

                            <td>

                                <form method="POST" onclick="return Confirm('Are you sure you went to delete ?')" action="{{url('/backend/admin/mobile/songs/delete',$singlemusic -> id)}}"  accept-charset="UTF-8">
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

            {!! $singlemusics->render() !!}


        </section>
    </section>

    <script src="{{asset('js/jquery.min.js')}}"></script>


    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>

    <script>
        $('#flash-overlay-modal').modal();
    </script>

@endsection