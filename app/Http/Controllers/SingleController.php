<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SingleMusic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SingleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //

        $singlemusics = SingleMusic::orderBy('id','desc')->paginate(5);

        return view('singlemusic.index') -> with('singlemusics',$singlemusics);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //


        return view('singlemusic.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //



        $this->validate($request, [
            'သီခ်င္းေခါင္းစဥ္' => 'required|max:1000',
            'image' => 'required|mimes:jpeg,png,jpg',

            'singer' => 'required|max:255',
            'content' => 'required'

        ]);







            $singlemusic = new SingleMusic();

            $singlemusic -> title = $request -> input( 'သီခ်င္းေခါင္းစဥ္');

            $singlemusic -> image = $request -> input( 'photo');

        $singlemusic -> singer = $request -> input('singer');



            $singlemusic -> mtv = $request -> input('mtv');



        $mp3path = public_path().'/upload/mp3';



        if(\Input::hasfile('mp3')){


            if(\Input::file('mp3')->getClientOriginalExtension() != "mp3"){

                $error = array();
                $error[] = "File type must be mp3";
                $validator = $error;


                return redirect()->route('music.create')->withInput()->withErrors($validator);

            }else{

                $mp3name = \Input::file('mp3')->getClientOriginalname();

                $mp3rename = str_random(20);

                \Input::file('mp3')->move($mp3path, $mp3rename);


                $uploadedfile = Storage::get($mp3rename);



             Storage::disk('s3')->put($mp3name,$uploadedfile);


                \File::delete(public_path()."/upload/mp3/".$mp3rename);

                $singlemusic -> mp3 = "https://s3-us-west-2.amazonaws.com/myanmarmusicart/".$mp3name;


            }


        }


        $imagepath = public_path().'/upload/image';


        $imagename = \Input::file('image')->getClientOriginalExtension();



        $imgrename = str_random(20);

        $imgFileName = $imgrename.".".$imagename;

        \Input::file('image')->move($imagepath, $imgrename.".".$imagename);


        $singlemusic -> language = $request -> input('language');

        $singlemusic -> categories = $request -> input('categories');

        $singlemusic -> content = $request -> input('content');

        $singlemusic -> author = Auth::user()-> nickname;

        $singlemusic -> image = asset('/upload/image/'.$imgrename.".".$imagename);

        $singlemusic -> imageName = $imgFileName;





        $singlemusic -> save();



        return redirect()->route('music.index');








    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //

        $singlemusic = SingleMusic::find($id);

        return \Response::json($singlemusic);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //

        $singlemusic = SingleMusic::find($id);

        return view('singlemusic.edit')->with('singlemusic', $singlemusic);;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update($id,Request $request)


    {

        $singlemusic = SingleMusic::findOrNew($id);


        $this->validate($request, [
            'သီခ်င္းေခါင္းစဥ္' => 'required|max:1000',
            'singer' => 'required|max:255',
            'content' => 'required'

        ]);


        if (\Input::hasFile('image')) {


            \File::delete(public_path()."/upload/image/".$singlemusic -> imageName);



            $singlemusic -> image = $request -> input( 'photo');


            $imagepath = public_path().'/upload/image';
            $imagename = \Input::file('image')->getClientOriginalExtension();

            $imgrename = str_random(20);

            \Input::file('image')->move($imagepath, $imgrename.".".$imagename);

            $imgFileName = $imgrename.".".$imagename;

            $singlemusic -> image = asset('/upload/image/'.$imgrename.".".$imagename);

            $singlemusic -> imageName = $imgFileName;



        }


        $singlemusic -> title = $request -> input( 'သီခ်င္းေခါင္းစဥ္');

        $singlemusic -> singer = $request -> input('singer');

        $singlemusic -> mp3 = $request -> input('mp3');

        $singlemusic -> mtv = $request -> input('mtv');


        $singlemusic -> language = $request -> input('language');

        $singlemusic -> categories = $request -> input('categories');

        $singlemusic -> content = $request -> input('content');


        $singlemusic -> save();

        return redirect()->route('music.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {

        $singlemusic = SingleMusic::find($id);

        \File::delete(public_path()."/upload/image/".$singlemusic -> imageName);

        $singlemusic -> delete();


        return redirect()->route('music.index');



    }


}
