<?php

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
Route::group(['middleware' => 'auth'],function(){
    Route::get('/',function(){
        return view('newweb');
    });
});
Route::get('/welcome','HomeController@index');
Auth::routes();
route::get('/logout','\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
    Route::get('/', 'HomeController@index');
    //Route::get('/image','ImageController@showall');
    Route::resource('/image','ImageController');
    Route::resource('/picture','PictureController');
});
Route::get('/showpicture/{id}','CommentController@show');

Route::post('/comment','CommentController@store');
Route::group(['middleware' => 'auth', 'prefix' => 'manage'], function() {
    Route::get('/home', 'ManageController@indexx');
   Route::get('/managecomment','ManageController@index');
});
//Route::any('/upload','ImageController@showall');
Route::any('/storeinto','ImageController@store');
//Route::get('image/{id}','ImageController@destroy');
//Route::resource('/image','ImageController');