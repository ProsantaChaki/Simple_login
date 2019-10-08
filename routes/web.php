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

//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;


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


Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});
