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
Route::post('v1/password/recovery', 'API\UserController@recoveryCode');
Route::post('v1/password/reset', 'API\UserController@passwordReset');


Route::group(['middleware' => 'auth:api'], function(){

    Route::get('v1/users/{id}', 'API\UserController@details');
    Route::get('v1/logout/{id}','API\UserController@logout');
    Route::post('v1/users/{id}/update','API\UserController@updateInfo');
    Route::post('v1/users/{id}/photo/update','API\UserController@photoUpdate');
    Route::post('v1/password/change','API\UserController@updatePassword');




    Route::post('v1/post/user/activities','API\PostController@userActivities');

    Route::post('v1/post/create','API\PostController@create');
    Route::get('v1/post/user/{userId}','API\PostController@getUsersAllPost');
    Route::get('v1/post/user/{userId}/{postId}','API\PostController@getUsersPost');
    Route::post('v1/post/update/{postId}','API\PostController@updatePost');

    Route::post('v1/post/{id}/update','API\PostController@updateInfo');
    Route::post('v1/post/{id}/review/submission','API\PostController@postReviewSubmission');
    Route::post('v1/post/{id}/review/view','API\PostController@postReviewView');
    Route::get('v1/post/{postId}/{status}','API\PostController@updateStatus');


});

Route::get('v1/user/{id}/profile','API\UserController@userPublicInfo');


//Route::post('post/validate','API\PostController@postValidator');

Route::post('v1/all/post','API\PostController@getAllPost');
Route::get('v1/single/post/{id}/details','API\PostController@details'); //use post method
//Route::post('v1/post/none','API\PostController@getAllPost'); //use post method




Route::get('v1/area/{type}/{name}','API\ResourcesController@area');
Route::get('v1/category/{column}/{name}','API\ResourcesController@category');
Route::post('v1/subcategory','API\ResourcesController@subCategory');
Route::get('v1/organizations','API\ResourcesController@organization');

