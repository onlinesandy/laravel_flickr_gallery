<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});



Route::namespace('App\Http\Controllers')->group(function () {
    Auth::routes();


	Route::get('/login', 'LoginController@index')->name('Adminlogin');
	Route::post('/login', 'LoginController@login');
	Route::get('/logout', 'LoginController@logout')->name('logout');

	Route::group(['middleware' => ['auth']], function () {
	    //DashboardContoller
	    Route::get('/cat_list', 'CategoryController@index')->name('CatList');
	    Route::post('/addcategory', 'CategoryController@saveCategory')->name('saveCategory');
	    Route::post('/delcategory', 'CategoryController@delCategory')->name('delCategory');
	    Route::post('/delcategory', 'CategoryController@delCategory')->name('delCategory');
	    Route::post('/updateStatusCategory', 'CategoryController@updateStatusCategory')->name('updateStatusCategory');


	});

});




