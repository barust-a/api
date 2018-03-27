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

//User Route

Route::get('/users', 'AllUserControler@GetAllUsers');

Route::get('/users/{id}', 'AllUserControler@GetUserId')->where('name', '[0-9]+');

Route::delete('/delete-user/{$id}', 'AllUserControler@DeleteUser');

Route::get('/userName/{name}', 'AllUserControler@GetUserName');

//Resto Route

Route::get('/restos', 'AllRestoControllers@GetAllResto');

Route::get('/restos/{id}', 'AllRestoControllers@GetRestoId')->where('name', '[0-9]+');

Route::delete('/delete-resto/{id}', 'AllRestoControllers@DeleteResto');

Route::get('/restoName/{name}', 'AllRestoControllers@GetRestoName');

//menu route

Route::get('/menus', 'MenuController@GetAllMenu');

Route::get('/menus/{id}', 'MenuController@GetMenu')->where('name', '[0-9]+');

Route::delete('/delete-menu/{id}', 'MenuController@DeleteMenu');

Route::get('/menuResto/{id}', 'MenuController@GetRestoMenu');


//Avis Route

Route::get('/avis', 'AvisController@GetAllAvis');

Route::get('/avis/{id}', 'AvisController@GetAvis')->where('name', '[0-9]+');

Route::delete('/delete-avis/{id}', 'AvisController@DeleteAvis');

Route::get('/avisResto/{id}', 'AvisController@GetRestoAvis');

Route::get('/avisUser/{id}', 'AvisController@GetUserAvis');

Route::get('{$name}', 'AllRestoControllers@GetRestoName');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/avisUserResto/{id_user}/{id_resto}', 'AvisController@GetRestoUserAvis');