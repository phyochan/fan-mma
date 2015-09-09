<?php
/**
 * Created by PhpStorm.
 * User: phyochan
 * Date: 9/8/2015
 * Time: 4:59 PM
 */

namespace App\Http\Controllers;

use App\Request;

use App\Sends;
use Illuminate\Support\Facades\Validator;


class EmailController extends Controller{


    public function index($id){


        $request = Request::findOrNew($id);




        return view('email.index') ->with('request',$request);


    }

public function sendIndex($id){


    $send = Sends::findOrNew($id);




    return view('email.sendIndex') ->with('send',$send);


}




    public function send($id)
    {


        $request = Request::findOrNew($id);


        $rules = array(

            'email' => ''


        );


        $validator = Validator::make(\Input::all(), $rules);

        if ($validator->fails()) {
            return \Redirect::to('/request')
                ->withErrors($validator)
                ->withInput();

        } else {


            var_dump(\Input::get('email'));

            $music = \Input::get('music');

            $name = $request->name;


            $data = array(

                'request' => $request,
                'music' => $music,
                'name' => $name
            );

            \Mail::send('email.request', $data, function ($message) {
                $message->to(\Input::get('email'), "Myanmar Music Art Request User")->subject("Myanmar Music Art တြင္သီခ်င္းေတာင္းဆုိထားျခင္း");
            });


            \Flash::overlay('Mail Send Finish!', "Complete.");

            return \Redirect::to('/backend/admin/request');


        }

    }



        public function Ugsend($id){


            $send = Sends::findOrNew($id);


                $music = \Input::get('music');

                $name = $send -> name;




                $data = array(

                    'send' => $send,
                    'music' => $music,
                    'name' => $name
                );

                \Mail::send('email.send', $data, function($message) {
                    $message->to(\Input::get('email'), "Myanmar Music Art UG Songs")->subject("Myanmar Music Art တြင္သီခ်င္းေတာင္းဆုိထားျခင္း");
                });


                \Flash::overlay('Mail Send Finish!',"Complete.");

                return \Redirect::to('/backend/admin/ugsongs/request');




    }


}



