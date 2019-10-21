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

Route::post('v1/login', 'API\UserController@login');
Route::post('v1/register', 'API\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){

    Route::get('v1/users/{id}', 'API\UserController@details');
    Route::get('v1/logout/{id}','API\UserController@logout');
    Route::post('v1/users/{id}/update','API\UserController@updateInfo');



    Route::post('v1/post/create','API\PostController@create');
    Route::post('v1/post/{id}/update','API\PostController@updateInfo');
    Route::post('v1/post/{id}/review/submission','API\PostController@postReview');
    Route::post('v1/post/{id}/review/view','API\PostController@postReviewView');



});



//Route::post('post/validate','API\PostController@postValidator');

Route::get('v1/all/post/view','API\PostController@index');
Route::get('v1/post/{id}/details','API\PostController@details'); //use post method
