<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/request','RequestController@show');
Route::post('/request','RequestController@request');

Route::get('/ug/send','SendController@show');
Route::post('/ug/send','SendController@send');


Route::get('/login','LoginController@showlogin');


Route::post('/login','LoginController@dologin');


Route::get('/',function(){


    return Redirect::to('/request');

});


Route::get('/error/loginfail',function(){

   return view('errors.loginerror');


});



Route::group(['middleware' => 'apiauth'], function() {

    Route::get('/backend/admin/mobile/songs/api/all',function(){

        $singlemusic = \App\SingleMusic::orderBy('id', 'desc')->get();


        return \Response::json($singlemusic);


    });



});

Route::post('/backend/admin/mobile/songs/api/getcount/{id}','MobileSingleController@GetCount');
Route::get('/backend/admin/mobile/songs/api/getcount/{id}','MobileSingleController@GetCount');








Route::group(['middleware' => 'auth'], function() {


    Route::get('/backend/admin/mobile/songs/all',function(){

        $singlemusic = \App\SingleMusic::orderBy('id', 'desc')->get();


        return \Response::json($singlemusic);


    });



    Route::get('/logout','LoginController@dologout');
    Route::resource('/music','SingleController');
    Route::resource('/album','AlbumController');

    Route::resource('/backend/admin/mobile/songs/','MobileSingleController');

    Route::get('/backend/admin/mobile/songs/{id}','MobileSingleController@show');
    Route::post('/backend/admin/mobile/songs/{id}','MobileSingleController@update');

    Route::get('/backend/admin/mobile/songs/{id}/edit','MobileSingleController@edit');
    Route::delete('/backend/admin/mobile/songs/delete/{id}','MobileSingleController@destroy');






});

Route::group(['middleware' => 'auth'], function() {

    Route::get('/backend/admin','AdminController@index');

    Route::get('/backend/admin/request','AdminController@request');
    Route::post('/backend/admin/request/{id}','AdminController@requestApprove');

    Route::get('/backend/admin/ugsongs/request','AdminController@send');
    Route::post('/backend/admin/ugsongs/request/{id}','AdminController@sendApprove');

    Route::delete('/backend/admin/request/delete/{id}','AdminController@delete');
    Route::delete('/backend/admin/ugsongs/request/delete/{id}','AdminController@sendDelete');


    Route::get('/backend/admin/email/{id}','EmailController@index');
    Route::post('/backend/admin/email/{id}','EmailController@send');

    Route::get('/backend/admin/ug/email/{id}','EmailController@sendIndex');
    Route::post('/backend/admin/ug/email/{id}','EmailController@Ugsend');






    Route::get('/backend/',function(){


        return Redirect::to('/backend/admin');
    });

});




Route::get('/sendemail2', function () {




});