<?php
/**
 * Created by PhpStorm.
 * User: phyochan
 * Date: 6/30/2015
 * Time: 4:53 PM
 */

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\User;

class LoginController extends Controller{


    public function showlogin(){

        return view('login');
    }



    public function dologin(){


        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );


        $validator = Validator::make(\Input::all(), $rules);


        if ($validator->fails()) {
            return \Redirect::to('/login')
                ->withErrors($validator)
                ->withInput(\Input::except('password'));
        } else {

            // create our user data for the authentication
            $userdata = array(
                'email' => \Input::get('email'),
                'password' => \Input::get('password')
            );

            if (Auth::attempt($userdata)) {

                return \Redirect::to('/backend/admin');

            } else {

                return \Redirect::to('/error/loginfail');

            }


        }
    }


    public function dologout(){

        Auth::logout(); // log the user out of our application
        return \Redirect::to('/');

    }
}