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
// use Illuminate\Support\Facades\Auth;
if (Auth::check()) {
    $role = Auth::user()->role;
}


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/logout', 'Auth\LoginController@logout')->middleware('auth');

route::get('/home/issue','DashboardController@issue')->middleware('auth'); //issue asset
route::get('/home/create','DashboardController@create')->middleware('auth'); //create asset
route::get('/home/requests','DashboardController@requests')->middleware('auth'); //view the asset request
route::get('/home/fine','DashboardController@fine')->middleware('auth'); //fine users
route::get('/home/file','DashboardController@file')->middleware('auth'); //file issues
route::get('/home/viewissues','DashboardController@viewissues')->middleware('auth'); //view issues
route::get('/home/purchase','DashboardController@purchase')->middleware('auth'); //purchase assets
route::get('/home/edit','DashboardController@edit')->middleware('auth'); //edit profile
route::get('/home/requestnewasset','DashboardController@newasset')->middleware('auth'); //request for a new asset
route::get('/home/newassetrequests','DashboardController@assetrequests')->middleware('auth'); //see the new asset requests
route::get('/home/assignrole','DashboardController@assignrole')->middleware('auth');//Assignrole to user
route::get('/home/changerole','DashboardController@changerole')->middleware('auth');//change role ofuser user
route::get('/home/return','DashboardController@return')->middleware('auth');
route::get('/home/userrequests','DashboardController@userRequests')->middleware('auth');
route::get('/home/usergranted','DashboardController@userGranted')->middleware('auth');

route::post('/home/issue/store','AssetsController@store')->middleware('auth'); //issue asset
route::post('home/create/store','AssetsController@create')->middleware('auth'); //create asset 
route::post('/home/purchase/index','AssetsController@index')->middleware('auth'); //order asset 
route::post('/home/assignedRole','AssetsController@assignrole')->middleware('auth');//assigns role
route::post('/home/changedRole','AssetsController@changerole')->middleware('auth');//changess role
route::post('/home/file/fileissues','AssetsController@fileIssues')->middleware('auth');
route::post('/home/issue/file','AssetsController@file')->middleware('auth'); //fileissue
route::post('/home/requestnewasset/newasset','AssetsController@newasset')->middleware('auth'); //request for a new asset
route::post('/home/newassetrequests/create','AssetsController@createNew')->middleware('auth'); 
route::post('/home/requests/grant','AssetsController@edit')->middleware('auth');
route::post('home/viewissues/marksolved','AssetsController@markSolved')->middleware('auth');
route::post('/home/requests/returned','AssetsController@returned')->middleware('auth');

