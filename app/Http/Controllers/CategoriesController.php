<?php
/**
 * Created by PhpStorm.
 * User: phyochan
 * Date: 9/18/15
 * Time: 1:00 AM
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class CategoriesController extends Controller {



    public function show($categories){



        $singlemusic = \App\SingleMusic::orderBy('id', 'desc') -> where('categories', 'LIKE', $categories)->get();

        return \Response::json($singlemusic);
    }

}