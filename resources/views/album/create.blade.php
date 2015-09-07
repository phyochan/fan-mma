@extends('admin.index')
@section('content')

 <script src="{{asset('js/my.js')}}"></script>

        <div class="container">

            <div class="row">

                <div class="col-md-6">


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

                        <form action="{{route('album.store')}}" method="POST" enctype="multipart/form-data">

                            <input type="hidden" name="_token" value="{{ csrf_token()}}">

                              <div class="form-group">

                                     <label class="single-create-left single-create-top single-create-fontsize" for="">သီခ်င္းေခြအမည္</label>

                                     <input class="form-control single-create-left" type="text" name="Album Name" placeholder="သီခ်င္းေခြအမည္" value="{{old('Album Name')}}"/>

                               </div>

                             <div class="form-group">

                                      <label class="single-create-left single-create-top single-create-fontsize" for="">သီခ်င္းပုံတင္ရန္</label>

                                      <input  type="file" class="single-checkbox-top single-create-left" name="image" id="photo" onchange="PreviewImage('photo','uploadPreview');">

                                       <br/>

                                        <img  class="col-md-offset-4 img-thumbnail" id="uploadPreview" style="width: 300px; height: 300px; display: none" />

                              </div>



                             <div class="form-group">

                                          <label class="single-create-left single-create-top single-create-fontsize" for="">အဆိုေတာ္နာမည္</label>

                                         <input class="form-control single-create-left" type="text" name="singer" placeholder="အဆုိေတာ္နာမည္ေရးရန္" value="{{old('singer')}}"/>

                             </div>



                        </form>



                </div>


            </div>


        </div>


@endsection