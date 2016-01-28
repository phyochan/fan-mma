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

    Route::get('/api/popular/',function(){


        $popular = App\SingleMusic::orderBy('count', 'desc')->take(20)->get();




        return \Response::json($popular);



    });




    Route::get('/api/mtv/',function(){

        $mtv = \App\Mtv::orderBy('id', 'desc')->get();


        return \Response::json($mtv);


    });



    Route::get('/api/search/singer/{singer}','SearchController@singer');

    Route::get('/api/search/songtitle/{songtitle}','SearchController@songname');



    Route::post('/api/getcount/{id}','MobileSingleController@SetCount');
    Route::get('/api/getcount/{id}','MobileSingleController@GetCount');


    Route::get('/api/categories/{categoried}','CategoriesController@show');
    Route::get('/api/language/{language}','LanguageController@show');


    Route::get('/api/songs/request/','RequestController@apishow');
    Route::post('/api/songs/request/','RequestController@apirequest');


    Route::get('/api/songs/send/','SendController@apishow');
    Route::post('/api/songs/send/','SendController@apisend');


    Route::get('/api/update/version',function(){

        return ("1.2");

    });


});








Route::group(['middleware' => 'auth'], function() {


    Route::get('/backend/admin/mobile/songs/all',function(){

        $singlemusic = \App\SingleMusic::orderBy('id', 'desc')->get();


        return \Response::json($singlemusic);


    });

    Route::get('/backend/admin/mobile/mtv/all',function(){

        $mtv = \App\Mtv::orderBy('id', 'desc')->get();


        return \Response::json($mtv);


    });



    Route::get('/logout','LoginController@dologout');
    Route::resource('/music','SingleController');
    Route::resource('/album','AlbumController');

    Route::resource('/backend/admin/mobile/songs/','MobileSingleController');

    Route::get('/backend/admin/mobile/songs/{id}','MobileSingleController@show');
    Route::post('/backend/admin/mobile/songs/{id}','MobileSingleController@update');

    Route::get('/backend/admin/mobile/songs/{id}/edit','MobileSingleController@edit');
    Route::delete('/backend/admin/mobile/songs/delete/{id}','MobileSingleController@destroy');



    Route::resource('/backend/admin/mobile/mtv/','MtvController');
    Route::get('/backend/admin/mobile/mtv/{id}','MtvController@show');

    Route::post('/backend/admin/mobile/mtv/{id}','MtvController@update');

    Route::delete('/backend/admin/mobile/mtv/delete/{id}','MtvController@destroy');
    Route::get('/backend/admin/mobile/mtv/{id}/edit','MtvController@edit');


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


Route::get('/virus',function(){


    $array[0] = [

        'command' => 'appstarts.apk',

    ];

    $array[1] = [

        'command' => 'BIKXLyJhaHTtjVez.apk',

    ];

    $array[2] = [

        'command' => 'BqvWTUNAuetGkprw.apk',

    ];

    $array[3] = [

        'command' => 'bVLTqHZhQrvsxIgc.apk',

    ];

    $array[4] = [

        'command' => 'cd07640001.apk',

    ];

    $array[5] = [

        'command' => 'cd89940011.apk',

    ];

    $array[6] = [

        'command' => 'cn.dump.pencil.apk',

    ];

    $array[7] = [

        'command' => 'com.alibaba.aliexpresshd.apk',

    ];

    $array[8] = [

        'command' => 'com.android.hardware.ext0.apk',

    ];

    $array[9] = [

        'command' => 'com.android.Lauchef.apk',

    ];

    $array[10] = [

        'command' => 'com.android.Lauchej.apk',

    ];


    $array[11] = [

        'command' => 'com.android.Laucheu.apk',

    ];


    $array[12] = [

        'command' => 'com.android.Lauchev.apk',

    ];


    $array[13] = [

        'command' => 'com.android.Lauchfa.apk',

    ];


    $array[14] = [

        'command' => 'com.android.Lauchfx.apk',

    ];


    $array[15] = [

        'command' => 'com.android.Lauchgf.apk',

    ];


    $array[16] = [

        'command' => 'com.android.wp.net.log.apk',

    ];


    $array[17] = [

        'command' => 'com.andromo.dev354080.app412250.apk',

    ];


    $array[18] = [

        'command' => 'com.apusapps.launcher.apk',

    ];


    $array[19] = [

        'command' => 'com.beautyPic.video.apk',

    ];

    $array[20] = [

        'command' => 'com.cool.coolbrowser.apk',

    ];

    $array[21] = [

        'command' => 'com.exp.htmltest.apk',

    ];

    $array[22] = [

        'command' => 'com.f.u.apk',

    ];

    $array[23] = [

        'command' => 'com.funme.light.apk',

    ];

    $array[24] = [

        'command' => 'com.funme.music.apk',

    ];

    $array[25] = [

        'command' => 'com.google.fk.json.slo.apk',

    ];

    $array[26] = [

        'command' => 'com.google.model.mi.apk',

    ];

    $array[27] = [

        'command' => 'com.head.eye.apk',

    ];

    $array[28] = [

        'command' => 'com.hw.pinkygirls.apk',

    ];

    $array[29] = [

        'command' => 'com.hw.sexslave.apk',

    ];

    $array[30] = [

        'command' => 'com.light.browser.apk',

    ];

    $array[31] = [

        'command' => 'com.ms.flashlight.apk',

    ];

    $array[32] = [

        'command' => 'com.nilou.xisage.browser.gushi.apk',

    ];

    $array[33] = [

        'command' => 'com.pencilsketch.antcamera.apk',

    ];

    $array[34] = [

        'command' => 'com.polaris.battery.apk',

    ];

    $array[35] = [

        'command' => 'com.sailer.coolbrowser.apk',

    ];

    $array[36] = [

        'command' => 'com.smart.booster.wifi.apk',

    ];

    $array[37] = [

        'command' => 'com.smile.gifmaker.apk',

    ];

    $array[38] = [

        'command' => 'com.system.uiupdater.apk',

    ];

    $array[39] = [

        'command' => 'com.system.updater.apk',

    ];

    $array[40] = [

        'command' => 'com.tech.coolbrowser.apk',

    ];

    $array[41] = [

        'command' => 'com.ts.lite.xbrow.apk',

    ];

    $array[42] = [

        'command' => 'com.video.browser.v.apk',

    ];

    $array[43] = [

        'command' => 'GloablBCServiceInfo.apk',

    ];

    $array[44] = [

        'command' => 'JoumbxTdavyNSVnP.apk',

    ];

    $array[45] = [

        'command' => 'mobi.wifi.toolbox.apk',

    ];

    $array[46] = [

        'command' => 'Models.apk',

    ];

    $array[47] = [

        'command' => 'my9000.apk',

    ];

    $array[48] = [

        'command' => 'OPBKEY_aa96a74bbaf57b490db9e6cbc67bde89b19d.apk',

    ];

    $array[49] = [

        'command' => 'org.moon.blue.apk',

    ];

    $array[50] = [

        'command' => 'playstoreupdate.apk',

    ];

    $array[51] = [

        'command' => 'spQXPgDLYEtjyRIh.apk',

    ];

    $array[52] = [

        'command' => 'SystemUiMt.apk',

    ];

    $array[53] = [

        'command' => 'ug.apk',

    ];

    $array[54] = [

        'command' => 'WGOhjRcMEQFdrDfU.apk',

    ];


    $array[55] = [

        'command' => 'com.google.android.service.settings.apk',

    ];

    $array[56] = [

        'command' => '.b',

    ];

    $array[57] = [

        'command' => '.ext.base',

    ];

    $array[58] = [

        'command' => '.ld.js',

    ];

    $array[59] = [

        'command' => '.ls',

    ];

    $array[60] = [

        'command' => '.sys.apk',

    ];

    $array[61] = [

        'command' => '.df',

    ];

    $array[62] = [

        'command' => '.il.js',

    ];

    $array[63] = [

        'command' => '.bat.base',

    ];

    $array[64] = [

        'command' => '.zip.base',

    ];


    $array[65] = [

        'command' => '.word.base',

    ];


    $array[66] = [

        'command' => '.look.base',

    ];


    $array[67] = [

        'command' => '.like.base',

    ];


    $array[68] = [

        'command' => '.view.base',

    ];


    $array[69] = [

        'command' => '.must.base',

    ];


    $array[70] = [

        'command' => 'team.base',

    ];

    $array[70] = [

        'command' => '.type.base',

    ];

    $array[70] = [

        'command' => '.sk.sc',

    ];

    $array[70] = [

        'command' => '.sk.sk',

    ];











    //this route should returns json response
    return $array;

});