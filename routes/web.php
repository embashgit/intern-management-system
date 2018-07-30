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
    return view('welcom');
});

  
  
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->group(function(){
Route::resource('staff', 'staffController');

Route::get('/login', 'Auth\adminloginController@showloginForm')->name('admin.login');
Route::post('/login', 'Auth\adminloginController@Login')->name('admin.login.submit');
Route::get('/home', 'adminController@index')->name('admin.dashboard');
Route::post('/home/{image}', 'adminController@saveImage')->name('admin.update');

Route::get('/create', 'adminController@create')->name('create.staff');
Route::post('/create/staff', 'adminController@store')->name('store.staff');


});
Route::prefix('staff')->group(function(){
	Route::get('/login', 'Auth\staffLoginController@showloginForm')->name('staff.login');
	Route::post('/login', 'Auth\staffLoginController@Login')->name('staff.login.submit');
	Route::get('/home', 'staffController@index')->name('staff.dashboard');
	Route::post('/home/{image}', 'staffController@saveImage')->name('staff.update.image');
	});

Route::resource('projects', 'projectController');



