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


                 @if(Session::has('error'))
                     <p class="errors">{!! Session::get('error') !!}</p>
                 @endif

                <form action="{{route('music.store')}}" method="POST" enctype="multipart/form-data">

                 <input type="hidden" name="_token" value="{{ csrf_token()}}">

                    <div class="form-group">

                        <label class="single-create-left single-create-top single-create-fontsize" for="">သီခ်င္းေခါင္းစဥ္</label>

                        <input class="form-control single-create-left" type="text" name="သီခ်င္းေခါင္းစဥ္" placeholder="သီခ်င္းေခါင္းစဥ္ေရးရန္" value="{{old('သီခ်င္းေခါင္းစဥ္')}}"/>

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


                    <div class="form-group">

                         <div class="checkbox single-create-left single-create-top">
                            <label><input type="checkbox" value="" onclick="showMe('mp3',this)">Mp3 သီခ်င္း</label>

                         <input  type="file" class="single-checkbox-top" name="mp3" id="mp3" style="display: none" >

                    </div>

                    </div>

                    <div class="form-group">

                        <div class="checkbox single-create-left single-create-top">
                            <label><input type="checkbox" value="" onclick="showMe('mtv',this)">MTV သီခ်င္း</label>
                            <input class="form-control single-checkbox-top" type="text" style="display: none" id="mtv" name="mtv" placeholder="MTV Link ေရးရန္" value="{{old('mtv')}}" />

                         </div>

                    </div>

                    <div class="form-group">

                        <label class="single-create-left single-create-top single-create-fontsize" for="">သီခ်င္းဘာသာစကား</label>
                        <select class="form-control single-create-left" name="language" title="သီခ်င္းဘာသာစကားေရြးေပးရန္">
                            <option value="myanmar">Myanmar</option>
                            <option value="english">English</option>
                            <option value="korea">Korea</option>

                        </select>



                    </div>




                    <div class="form-group">

                        <label class="single-create-left single-create-top single-create-fontsize" for="">သီခ်င္းအမ်ိဳးအစား</label>
                        <select class="form-control single-create-left" name="categories">
                            <option value="hiphop">HipHop</option>
                            <option value="r&b">R & B</option>
                            <option value="rock">Rock</option>
                            <option value="pop">Pop</option>
                            <option value="electro">Electro</option>
                        </select>

                    </div>



                    <div class="form-group">

                        <label class="single-create-left single-create-top single-create-fontsize" for="">သီခ်င္းအေၾကာင္းအရာ</label>
                        <textarea class="form-control single-create-top single-create-left" name="content" id="" cols="30" rows="10" placeholder="သီခ်င္းအေၾကာင္းေရးရန္"></textarea>


                    </div>

                    <div class="form-group">

                        <button class="btn btn-success center-block single-create-top">တင္မယ္</button>

                    </div>




                </form>

            </div>

        </div>

    </div>

@endsection
