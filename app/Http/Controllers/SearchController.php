<?php
/**
 * Created by PhpStorm.
 * User: phyochan
 * Date: 11/24/15
 * Time: 2:34 PM
 */

namespace App\Http\Controllers;

class SearchController extends Controller{


    public function singer($name){

        $singlemusic = \App\SingleMusic::orderBy('id', 'desc') -> where('singer', 'LIKE', '%' . $name . '%')->get();

        return \Response::json($singlemusic);

    }

    public function songname($name){

        $singlemusic = \App\SingleMusic::orderBy('id', 'desc') -> where('songtitle', 'LIKE', '%' . $name . '%')->get();

        return \Response::json($singlemusic);

    }

}

