<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SingleMusic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use App\Mtv;
use Carbon\Carbon;

class MobileSingleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //

        $singlemusics = SingleMusic::orderBy('id','desc')->paginate(10);
        $mtvs = Mtv::orderBy('id','desc')->paginate(10);


        $mp3downloads = SingleMusic::where('count', '>=','0')->sum('count');




        return view('mobile.single.index')->with('singlemusics',$singlemusics)->with('mtvs',$mtvs)->with('mp3downloads',$mp3downloads);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //

        return view('mobile.single.create');
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
            'songname' => 'required|max:1000',
            'singer' => 'required|max:255',
            'content' => 'required'

        ]);


        $singlemusic = new SingleMusic();



        $singlemusic -> songtitle = $request -> input( 'songname');


        $singlemusic -> singer = $request -> input('singer');

        $singlemusic -> language = $request -> input('language');

        $singlemusic -> categories = $request -> input('categories');

        $singlemusic -> content = $request -> input('content');






        if(\Input::hasfile('mp3')) {


            if (\Input::file('mp3')->getClientOriginalExtension() != "mp3") {

                $error = array();
                $error[] = "File type must be mp3";
                $validator = $error;


                return \Redirect::to('/backend/admin/mobile/songs/create')->withInput()->withErrors($validator);

            } else {

                $time = Carbon::now();


                $mp3path = public_path().'/download/mp3/'. \Auth::user()->name."/". $time->year."-".$time->month;

                $mp3name = \Input::file('mp3')->getClientOriginalName();

               // $mp3rename = str_random(20);



                \Input::file('mp3')->move($mp3path,$mp3name);


              //  $uploadedfile = Storage::get($mp3rename.".".$mp3name);




               // Storage::disk('s3')->put($mp3rename.".".$mp3name, $uploadedfile);

              //  $url = Storage::disk('s3')->getDriver()->getAdapter()->getClient()->getObjectUrl('myanmarmusicart',$mp3rename.".".$mp3name);



               // \File::delete(public_path() . "/upload/mp3/" . $mp3rename.".".$mp3name);

                $url = asset('/download/mp3/'.\Auth::user()->name."/".$time->year."-".$time->month."/".$mp3name);

                $singlemusic->mp3 = $url;


            }

        }

            $imagepath = public_path().'/upload/image';


            $imagename = \Input::file('photo')->getClientOriginalExtension();



            $imgrename = str_random(20);

            $imgFileName = $imgrename.".".$imagename;

            \Input::file('photo')->move($imagepath, $imgrename.".".$imagename);




            $singlemusic -> image = asset('/upload/image/'.$imgrename.".".$imagename);

            $singlemusic -> imageName = $imgFileName;

            $singlemusic -> author =  \Auth::user() -> nickname;

            $singlemusic -> save();

            \Flash::overlay('Mobile Api Added!',"Complete");


            return \Redirect::to('/backend/admin/mobile/songs/');





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

        $singlemusic = SingleMusic::findOrNew($id);


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
        $singlemusic = SingleMusic::findOrNew($id);

        return view('mobile.single.edit')->with('singlemusic',$singlemusic);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //

        $this->validate($request, [
            'songname' => 'required|max:1000',
            'singer' => 'required|max:255',
            'content' => 'required'

        ]);

        $singlemusic = SingleMusic::findOrNew($id);


        if(\Input::hasfile('photo')){


            $imagepath = public_path().'/upload/image';


            $imagename = \Input::file('photo')->getClientOriginalExtension();

            $imgrename = str_random(20);


            $singlemusic -> image = asset('/upload/image/'.$imgrename.".".$imagename);


            $imgFileName = $imgrename.".".$imagename;

            \Input::file('photo')->move($imagepath, $imgrename.".".$imagename);

            $singlemusic -> imageName = $imgFileName;

        }


        if(\Input::hasfile('mp3')){

            if (\Input::file('mp3')->getClientOriginalExtension() != "mp3") {

                $error = array();
                $error[] = "File type must be mp3";
                $validator = $error;


                return \Redirect::to('/backend/admin/mobile/songs/create')->withInput()->withErrors($validator);

            } else {



                $time = Carbon::now();


                $mp3path = public_path().'/download/mp3/'. \Auth::user()->name."/". $time->year."-".$time->month;

                $mp3name = \Input::file('mp3')->getClientOriginalName();

                // $mp3rename = str_random(20);



                \Input::file('mp3')->move($mp3path,$mp3name);


                //  $uploadedfile = Storage::get($mp3rename.".".$mp3name);




                // Storage::disk('s3')->put($mp3rename.".".$mp3name, $uploadedfile);

                //  $url = Storage::disk('s3')->getDriver()->getAdapter()->getClient()->getObjectUrl('myanmarmusicart',$mp3rename.".".$mp3name);



                \File::delete(public_path().'/download/mp3/'. \Auth::user()->name."/". $time->year."-".$time->month."/".$mp3name);

                $url = asset('/download/mp3/'.\Auth::user()->name."/".$time->year."-".$time->month."/".$mp3name);

                $singlemusic->mp3 = $url;






            }
        }


        $singlemusic -> songtitle = $request -> input( 'songname');

        $singlemusic -> singer = $request -> input('singer');

        $singlemusic -> language = $request -> input('language');

        $singlemusic -> categories = $request -> input('categories');

        $singlemusic -> content = $request -> input('content');



     //   $singlemusic -> author =  \Auth::user() -> nickname;

        $singlemusic -> save();

        \Flash::overlay('Mobile Api Edited!',"Complete");


        return \Redirect::to('/backend/admin/mobile/songs/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //

        $singlemusic = SingleMusic::find($id);

        \File::delete(public_path()."/upload/image/".$singlemusic -> imageName);

        $singlemusic -> delete();

        \Flash::info('Completed');


        return \Redirect::to('/backend/admin/mobile/songs');
    }

    public function GetCount($id){

        $singlemusic = SingleMusic::findOrNew($id);


        return view('mobile.single.count') -> with('singlemusic',$singlemusic);


    }

    public function SetCount($id){

        $singlemusic = SingleMusic::findOrNew($id);



        $singlemusic -> count = $singlemusic -> count +1 ;

        $singlemusic -> save();




        return view('mobile.single.count') -> with('singlemusic',$singlemusic);
    }
}