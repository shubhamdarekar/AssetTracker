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
Route::get('/logout', 'Auth\LoginController@logout');

route::get('/home/issue','DashboardController@issue');
route::get('/home/create','DashboardController@create');
route::get('/home/requests','DashboardController@requests');
route::get('/home/fine','DashboardController@fine');
route::get('/home/file','DashboardController@file');
route::get('/home/history','DashboardController@history');
route::get('/home/otherDepartmentDetails','DashboardController@otherDepartmentDetails');
route::get('/home/purchase','DashboardController@purchase');
route::get('/home/edit','DashboardController@edit');
route::get('/home/requestnewasset','DashboardController@newasset');
route::get('/home/newassetrequests','DashboardController@assetrequests');

route::post('/home/issue/store','AssetsController@store');
route::post('home/create/store','AssetsController@create');