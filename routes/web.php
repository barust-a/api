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

Route::get('/users', 'AllUserControler@GetAllUsers');

Route::get('/userId/{$id}', 'AllUserControler@GetUserId');

Route::get('/userName/{$name}', 'AllUserControler@GetUserName');

Route::get('/restos', 'AllRestoControllers@GetAllResto');

Route::get('/restoId/{$id}', 'AllRestoControllers@GetRestoId');

Route::get('/restoName/{$name}', 'AllRestoControllers@GetRestoName');