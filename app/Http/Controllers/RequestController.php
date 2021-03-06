<?php
/**
 * Created by PhpStorm.
 * User: phyochan
 * Date: 9/4/2015
 * Time: 11:27 AM
 */

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Request;

class RequestController extends Controller{


        public function show(){


            return view('fan.request');

        }


    public function request(){


        $rules = array(

            'name' => 'required',
            'songname' => 'required',
            'singer' => 'required',
            'email' => 'required|email'

        );


        $validator = Validator::make(\Input::all(), $rules);

        if ($validator->fails()) {
            return \Redirect::to('/request')
                ->withErrors($validator)
                ->withInput();

        } else {


            $request = new Request();


            $request -> name =  \Input::get('name');

            $request -> songname =\Input::get('songname');

            $request -> singer = \Input::get('singer');

            $request -> email = \Input::get('email');


            $request -> save();



            \Flash::overlay('Your Request Has Been Complete.',"Thank you for your request");


            return \Redirect::to('/request');


        }
    }


    public function apishow(){


        return view('mobile.single.request');
    }

    public function apirequest(){


        $request = new Request();


        $request -> songname  = \Input::get('songname');

        $request -> name = \Input::get('name');

        $request -> email = \Input::get('email');

        $request -> singer = \Input::get('singer');

        $request -> save();

        return \Redirect::to('/api/songs/request/');





    }



}