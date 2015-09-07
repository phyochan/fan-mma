<?php

namespace App\Http\Controllers;




use App\Http\Controllers\Controller;
use App\Request;
use App\Sends;
use Illuminate\Support\Facades\Redirect;
use Laracasts\Flash\Flash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //

        return view('admin.dashboard');
    }

    public function request(){

    $requests = Request::orderBy('id')->paginate(5);

        return view('admin.request')->with('requests',$requests);
    }


    public function send(){

        $sends = Sends::orderBy('id')->paginate(5);

        return view('admin.send')->with('sends',$sends);

}

    public function requestApprove($id){


        $request = Request::findOrNew($id);

        $request -> approve = \Auth::user() -> nickname;

        $request -> save();


        \Flash::success('Completed');

        return Redirect::to('/backend/admin/request');

    }


    public function sendApprove($id){

        $send = Sends::findOrNew($id);

        $send -> approve = \Auth::user() -> nickname;

        $send -> save();


        \Flash::success('Completed');

        return Redirect::to('/backend/admin/ugsongs/request');

    }



    public function delete($id){

        $request = Request::find($id);



        $request -> delete();

        \Flash::info('Completed');


        return Redirect::to('/backend/admin/request');

    }

    public function sendDelete($id){

        $send = Sends::find($id);

        \File::delete(public_path()."/upload/send/image/".$send -> imagefilename);

        \File::delete(public_path()."/upload/send/mp3/".$send -> mp3filename);

        $send -> delete();

        \Flash::info('Completed');


        return Redirect::to('/backend/admin/ugsongs/request');

    }




    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
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
    }
}
