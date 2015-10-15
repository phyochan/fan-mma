@extends('admin.index')
@section('content')

    <div class="container">

        <div class="row">

            <div class="col-lg-8">

                <h2>သီခ်င္းမ်ား</h2>

                <br/>

                <a class="btn btn-primary btn-large" href="{{route('music.create')}}">သီခ်င္းအသစ္တင္ရန္</a>

                 <a class="btn btn-primary btn-large" href="{{URL::to('/music/all')}}">အားလုံးၾကည့္ရန္ </a>

                 <br/><br/>



                <table class="table table-bordered">



                    <thead>

                    <tr>

                        <th>ID</th>
                        <th>Song Title</th>
                        <th>Author</th>
                        <th>Singer</th>
                        <th>Categories</th>


                        <th>View</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>

                    </thead>


                    <tbody>

                        @foreach($singlemusics as $singlemusic)

                        <tr>

                            <td>{{$singlemusic -> id}}</td>
                            <td>{{$singlemusic -> title}}</td>
                            <td>{{$singlemusic -> author}}</td>
                            <td>{{$singlemusic -> singer}}</td>
                             <td>{{$singlemusic -> categories}}</td>


                            <td><a class="btn btn-success" href="{{route('music.show',$singlemusic -> id)}}">view</a></td>
                            <td>

                              @if(Auth::user() -> nickname == $singlemusic -> author)


                               <a class="btn btn-primary" href="{{route('music.edit',$singlemusic -> id)}}">edit</a></td>

                              @endif



                            <td>

                                @if(Auth::user() -> nickname == $singlemusic -> author || Auth::user() -> nickname == "Phyo Chan")


                            <form method="POST" action="{{ route("music.destroy", $singlemusic->id) }}" accept-charset="UTF-8">
                                <input name="_method" type="hidden" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>


                                @endif


                            </td>

                        </tr>


                        @endforeach



                    </tbody>



                </table>

                 {!! $singlemusics->render() !!}

            </div>

        </div>

    </div>

@endsection

@include('dialog');