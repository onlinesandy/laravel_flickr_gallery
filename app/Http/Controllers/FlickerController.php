<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Flickr;

class FlickerController extends Controller
{
    public function index() {
        $arrayOfParameters = ['tags'=>'cat','per_page'=>'10','page'=>2];
	    $echoTest = Flickr::request('flickr.photos.search', $arrayOfParameters);
	    echo '<pre>';
	    print_r($echoTest);
       
    }
}
