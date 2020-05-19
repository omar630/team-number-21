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

Auth::routes();

route::get('/',function(){
	return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'App\Http\middleware\AdminMiddleware'], function(){
	Route::any('/admin','AdminController@home')->name('admindashboard');
});

Route::group(['middleware' => 'App\Http\middleware\SuperAdminMiddleware'], function(){
	Route::any('/master','SuperAdminController@home')->name('masterdashboard');
});

Route::group(['middleware' => 'App\Http\middleware\MemberMiddleware'], function(){
	Route::any('/member','MemberController@home')->name('memberdashboard');
});
