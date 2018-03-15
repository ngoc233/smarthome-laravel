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
Route::get('demo',function()
{
	return view('admin.layouts.index');
});
Route::get('admin/login','LoginController@getLogin');
Route::post('admin/login','LoginController@postLogin');
Route::get('admin/logout','LoginController@logOut');
Route::group(['prefix' => 'admin','middleware' => 'adminLogin'],function()
{
	Route::resource('temperature','TemperatureController');
	Route::resource('homehumidity','HomeHumidityController');
	Route::resource('landhumidity','LandHumidityController');
	Route::get('dashboard','DashBoardController@index');
	Route::get('controll	',function()
	{
		return view('user.index');
	});
});

