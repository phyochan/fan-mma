<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\SingleMusic;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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

        return view('mobile.single.index')->with('singlemusics',$singlemusics);
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
            'mp3' => 'required',
            'content' => 'required'

        ]);

        $singlemusic = new SingleMusic();


        $imagepath = public_path().'/upload/image';


        $imagename = \Input::file('photo')->getClientOriginalExtension();



        $imgrename = str_random(20);

        $imgFileName = $imgrename.".".$imagename;

        \Input::file('photo')->move($imagepath, $imgrename.".".$imagename);


        $singlemusic -> songtitle = $request -> input( 'songname');

        $singlemusic -> mp3 = $request -> input('mp3');

        $singlemusic -> singer = $request -> input('singer');

        $singlemusic -> language = $request -> input('language');

        $singlemusic -> categories = $request -> input('categories');

        $singlemusic -> content = $request -> input('content');

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
            'mp3' => 'required',
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


        $singlemusic -> songtitle = $request -> input( 'songname');

        $singlemusic -> mp3 = $request -> input('mp3');

        $singlemusic -> singer = $request -> input('singer');

        $singlemusic -> language = $request -> input('language');

        $singlemusic -> categories = $request -> input('categories');

        $singlemusic -> content = $request -> input('content');



        $singlemusic -> author =  \Auth::user() -> nickname;

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

        if(Input::get('download') == 'count'){

            $singlemusic -> count = $singlemusic -> count +1 ;

            $singlemusic -> save();
        }



        return view('mobile.single.count') -> with('singlemusic',$singlemusic);


    }
}