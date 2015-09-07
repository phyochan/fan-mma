<?php
/**
 * Created by PhpStorm.
 * User: phyochan
 * Date: 9/4/2015
 * Time: 12:54 PM
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Sends;

class SendController extends Controller{

    public function show(){

        return view('fan.send');

    }


    public function send()
    {

        $rules = array(

            'name' => 'required',
            'songname' => 'required',
            'singer' => 'required',
            'email' => 'required|email',
            'image' => 'required|mimes:jpeg,png,jpg'

        );

        $validator = Validator::make(\Input::all(), $rules);

        if ($validator->fails()) {
            return \Redirect::to('/ug/send')
                ->withErrors($validator)
                ->withInput();

        } else {

            if (\Input::hasfile('mp3')) {


                if (\Input::file('mp3')->getClientOriginalExtension() != "mp3") {

                    $error = array();
                    $error[] = "File type must be mp3";
                    $validator = $error;


                    return \Redirect::to('/ug/send')->withInput()->withErrors($validator);

                } else {

                    $mp3path = public_path().'/upload/send/mp3';

                    $mp3name = \Input::file('mp3')->getClientOriginalname();



                    \Input::file('mp3')->move($mp3path, $mp3name);


                    $imagepath = public_path().'/upload/send/image';


                    $imagename = \Input::file('image')->getClientOriginalExtension();



                    $imgrename = str_random(20);

                    $imgFileName = $imgrename.".".$imagename;

                    \Input::file('image')->move($imagepath, $imgrename.".".$imagename);


                    $send = new Sends();

                    $send -> name =  \Input::get('name');

                    $send -> songname =\Input::get('songname');

                    $send -> singer = \Input::get('singer');

                    $send -> email = \Input::get('email');

                    $send -> mp3 = asset('upload/send/mp3/'.$mp3name);

                    $send -> image = asset('upload/send/image/'.$imgFileName);

                    $send -> mp3filename = $mp3name;

                    $send -> imagefilename = $imgFileName;


                    $send -> save();



                    \Flash::overlay('Please Wait! While We Finish Upload in Myanmar Music Art.',"Thank you for your music");


                    return \Redirect::to('/ug/send');


                }


            }

        }

    }


}