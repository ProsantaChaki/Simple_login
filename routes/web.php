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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/user', function (){
   return view('user.profile.profile') ;
});


Route::get('/user/name', function (){
    return view('layouts.home') ;
});


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');



Route::resource('/user/user', 'UserController',['names'=>[

    'index'=>'user.profile.index',
    'create'=>'user.profile.create',
    'store'=>'user.profile.store',
    'edit'=>'user.profile.update'



]]);


Route::get('users/{user}',  ['as' => 'users.edit', 'uses' => 'UserController@edit']);
Route::patch('users/{user}/update',  ['as' => 'users.update', 'uses' => 'UserController@update']);

Route::post('v1/photo','API\ResourcesController@photo');


Route::get('masterlayout', function () {

    return view('layouts.masterLayout');
});
Route::get('login', function () {
    return view('user.login');

});


Route::get('post', function () {
    return view('layouts.userLayout');

});
Route::get('userDashboardlayout', function () {
    return view('layouts.userDashboardLayout');

});
Route::get('temp', function () {
    return view('layouts.temp');

});
Route::get('profile', function () {
    return view('user.profile');

});
Route::get('updateprofile', function () {
    return view('user.updateProfile');

});
Route::get('createpost', function () {
    return view('user.post.create');

});
Route::get('updatepost/{userId}/{postId}', function () {
    return view('user.post.updatePost');

});

Route::get('userallpost', function () {
    return view('user.post.userAllPost');

});

Route::get('postview/{postId}', function ($postId) {
    return view('post.singlePostView')->with('postId',$postId);

});
Route::get('postreview', function () {
    return view('post.postReview');

});

Route::get('publicprofile/{id}', function ($id) {
    return view('user.profile.publicProfile')->with('uid',$id);

});
