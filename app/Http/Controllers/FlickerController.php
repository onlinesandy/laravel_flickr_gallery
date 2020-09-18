<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Flickr;
use Response;

class FlickerController extends Controller
{
    public function index() {
        $categories = Category::all();
	    return view('flickr')->with(['categories' => $categories]);
       
    }

    public function getFlickrPics(Request $request) {
    	$flickrPicsArr = [];
    	if(isset($request->tag) && $request->tag !=''){
    		$arrayOfParameters = ['tags'=>$request->tag ,'per_page'=>'20'];
		    $flickrPicsArr = Flickr::request('flickr.photos.search', $arrayOfParameters);
		    $picsArr = $flickrPicsArr->photos['photo'];
		    return Response::json(array('type' => 'success', 'data' => $picsArr));
    	}

       return Response::json(array('type' => 'error', 'text' => 'No Pics Found'));
    }
}
