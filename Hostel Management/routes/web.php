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

Route::get('home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'admin'], function(){
	Route::any('admin','AdminController@home')->name('admindashboard');
	Route::get('editmyhostel','AdminController@editMyHostel')->name('editmyhostel');
	Route::post('savemyhostel','AdminController@saveHostel')->name('savehostel');
	Route::any('addstudents','SuperAdminController@getAddStudents')->name('addstudents');
	Route::post('savestudent','SuperAdminController@saveStudent')->name('savestudent');
});

Route::group(['middleware' => 'superadmin'], function(){
	Route::any('master','SuperAdminController@home')->name('masterdashboard');
	Route::any('addhostel','SuperAdminController@addHostel')->name('addhostel');
	Route::post('submitaddhostel','SuperAdminController@addHostelDetails')->name('submitaddhostel');
	Route::get('addadmin','SuperAdminController@addAdmin')->name('addadmin');
	Route::get('edithostel','SuperAdminController@edithostel')->name('edithostel');
	Route::any('adminregister','SuperAdminController@registerAdmin')->name('adminregister');
	Route::get('addcollege','SuperAdminController@getAddCollege')->name('getaddcollege');
	Route::post('addcollege','SuperAdminController@postAddCollege')->name('postaddcollege');
	Route::any('savecourseforcollege','SuperAdminController@saveCourse')->name('addcoursecollege');
});

Route::group(['middleware' => 'member'], function(){
	Route::any('member','MemberController@home')->name('memberdashboard');
});
