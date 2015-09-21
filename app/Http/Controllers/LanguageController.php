<?php
/**
 * Created by PhpStorm.
 * User: phyochan
 * Date: 9/21/15
 * Time: 12:23 PM
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class LanguageController extends Controller {



    public function show($language){



        $singlemusic = \App\SingleMusic::where('language', 'LIKE', $language)->get();

        return \Response::json($singlemusic);
    }

}