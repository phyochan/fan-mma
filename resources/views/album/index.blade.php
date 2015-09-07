@extends('admin.index')
@section('content')

        <div class="container">


            <div class="row">

                <div class="col-lg-11">

                    <h2>သီခ်င္းေခြမ်ား</h2>

                    <br/>

                     <a class="btn btn-primary btn-large" href="{{route('album.create')}}">သီခ်င္းေခြအသစ္တင္ရန္</a>

                     <a class="btn btn-primary btn-large" href="{{URL::to('/music/all')}}">အားလုံးၾကည့္ရန္ </a>

                 <br/><br/>

                    <table class="table table-bordered">


                        <thead>

                                <tr>

                                <th>ID</th>
                                <th>Album Name</th>
                                <th>Author</th>
                                <th>Singer</th>
                                <th>Publish Date</th>


                                </tr>



                            <tbody>

                                <tr>

                                <td>1</td>
                                <td>name</td>
                                <td>author</td>
                                <td>singer</td>
                                <td>1</td>


                                </tr>


                            </tbody>



                        </thead>




                    </table>




                </div>


            </div>

        </div>

@endsection