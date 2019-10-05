<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Auth::routes();

Route::get('users', 'UserController@getUsers')->middleware('auth:api');

/*
 *
 */

Route::post('login', 'API\UserController@login');
Route::post('register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', 'API\UserController@details');
    Route::post('logout','API\UserController@logout');
    Route::post('updateinfo','API\UserController@updateInfo');



    Route::post('post/create','API\PostController@create');
    Route::post('post/updateinfo','API\PostController@updateInfo');
    Route::post('post/postReviewSubmission','API\PostController@postReview');
    Route::post('post/postReviewView','API\PostController@postReviewView');









});

//Route::post('post/validate','API\PostController@postValidator');

Route::post('post/view','API\PostController@index');
Route::post('post/details','API\PostController@details'); //use post method
