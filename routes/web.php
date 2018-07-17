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

Route::get('/test', function () {
    return 'testdsfadsf';
});


//Route::resource('api/chassis', 'ChassisController');

//Route::get('chassis', 'PageAppController@chassis');


Route::resource('api/phonebook', 'PhoneBookController');

Route::get('phonebook', 'PageController@phonebook');
