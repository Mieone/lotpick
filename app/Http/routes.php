<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/lat_location', 'Lot_Locations@index');
Route::get('/pick_list', 'Lot_Locations@pick_list');
Route::get('/add_lat_location', 'Lot_Locations@add_lat_location');
Route::post('/save_lot_loc', 'Lot_Locations@store');
Route::get('/pick_lot/{lotid}', 'Lot_Locations@picked');
Route::post('/pick_lot_post', 'Lot_Locations@pickedpost');
Route::post('/update_lot_status','Lot_Locations@update_lot');
Route::post('/update_lot_pickup','Lot_Locations@update_lot_pickup');
Route::post('/check_lot_id','Lot_Locations@check_lot_id');
Route::post('/check_lot_id_pick','Lot_Locations@check_lot_id_pick');
Route::get('/next_lot_pick/{sno}','Lot_Locations@next_lot_pick');
Route::get('/previous_lot_pick/{sno}','Lot_Locations@previous_lot_pick');
Route::get('/gp', 'Gpcontroller@index');
Route::post('/add_lot', 'Gpcontroller@store');
Route::post('/save_lot', 'Gpcontroller@store_lot');
Route::get('/update_lot_gp/{gpid}', 'Gpcontroller@update_lot_gp');
Route::get('/house', 'Warehouse@index');
Route::post('/house_save', 'Warehouse@store');
Route::get('/vendor', 'Vendor@index');
Route::post('/vendor_save', 'Vendor@store');
Route::get('/lot', 'Lotdetails@index');
Route::get('/profile', 'UserController@profile');
Route::post('/profile', 'UserController@update_avatar');
//Route::post('/login', 'UserController@update_avatar');
Route::get('/lot', 'lot@index');
Route::post('/lotreg', 'UserController@savelot');
Route::get('update_pick','Lot_Locations@update_pick');
Route::get('update_pick_lot','Lot_Locations@update_pick_lot');
Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/test', 'Lot_Locations@test');

