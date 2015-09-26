<?php
/**
 * Created by PhpStorm.
 * User: phyochan
 * Date: 9/27/15
 * Time: 1:54 AM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Mtv;
use Illuminate\Support\Facades\Redirect;


class MtvController extends Controller
{


public function create(){

    return view('mobile.mtv.create');
}

    public function store(Request $request){

        $this->validate($request, [
            'songname' => 'required|max:1000',
            'singer' => 'required|max:255',
            'youtubeid' => 'required|max:255'

        ]);

        $mtv =  new Mtv();



        $mtv -> songtitle = $request -> input( 'songname');
        $mtv -> singer = $request -> input('singer');
        $mtv -> youtubeid = $request -> input('youtubeid');
        $mtv-> author =  \Auth::user() -> nickname;

        $mtv -> save();

        return Redirect::to('/backend/admin/mobile/songs/');





    }

    public function show($id)
    {
        //

        $mtv = Mtv::findOrNew($id);


        return \Response::json($mtv);

    }

    public function edit($id)
    {
        //
        $mtv = Mtv::findOrNew($id);

        return view('mobile.mtv.edit')->with('mtv',$mtv);


    }

    public function update(Request $request, $id)
    {

        $this->validate($request, [
            'songname' => 'required|max:1000',
            'singer' => 'required|max:255',
            'youtubeid' => 'required|max:255'

        ]);

        $mtv =  Mtv::findOrNew($id);



        $mtv -> songtitle = $request -> input( 'songname');
        $mtv -> singer = $request -> input('singer');
        $mtv -> youtubeid = $request -> input('youtubeid');
        $mtv-> author =  \Auth::user() -> nickname;

        $mtv -> save();

        return Redirect::to('/backend/admin/mobile/songs/');

    }



    public function destroy($id)
    {
        //

        $mtv = Mtv::find($id);


        $mtv -> delete();

        \Flash::info('Completed');


        return \Redirect::to('/backend/admin/mobile/songs');
    }

}