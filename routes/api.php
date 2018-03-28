<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::post('login', 'API\PassportController@login');
Route::post('register', 'API\PassportController@register');
Route::get('get-details-all', 'API\PassportController@getDetailsAll');

Route::post('newresto', 'API\AllRestoControllers@NewResto');
Route::post('deleteresto', 'API\AllRestoControllers@DeleteResto');
Route::get('/restos', 'API\AllRestoControllers@GetAllResto');
Route::get('/restos/{id}', 'API\AllRestoControllers@GetRestoId')->where('name', '[0-9]+');
Route::delete('/delete-resto/{id}', 'API\AllRestoControllers@DeleteResto');
Route::get('/restoName/{name}', 'API\AllRestoControllers@GetRestoName');
Route::post('/upresto/{id}','API\AllRestoControllers@updateResto');
Route::get('/restosBest', 'API\AllRestoControllers@GetBest');

Route::group(['middleware' => 'auth:api'], function(){

    Route::post('get-details', 'API\PassportController@getDetails');

    Route::get('/avis', 'API\AvisController@GetAllAvis');
    Route::get('/avis/{id}', 'API\AvisController@GetAvis')->where('name', '[0-9]+');
    Route::delete('/delete-avis/{id}', 'API\AvisController@DeleteAvis');
    Route::get('/avisUser/{id}', 'API\AvisController@GetUserAvis');
    Route::post('/postcomment/{id}', 'API\AvisController@PostAvis');


});

//User Route

Route::get('/users', 'AllUserControler@GetAllUsers');

Route::get('/users/{id}', 'AllUserControler@GetUserId')->where('id', '[0-9]+');

Route::delete('/delete-user/{$id}', 'AllUserControler@DeleteUser');

Route::get('/userName/{name}', 'AllUserControler@GetUserName');

//menu route

Route::get('/menus', 'API\MenuController@GetAllMenu');

Route::get('/menu/{id}', 'API\MenuController@GetMenu')->where('id', '[0-9]+');

Route::delete('/delete-menu/{id}', 'API\MenuController@DeleteMenu');

Route::get('/menuResto/{id}', 'API\MenuController@GetRestoMenu');

Route::post('newmenu','API\MenuController@NewMenu');

Route::post('upmenu/{id}','API\MenuController@updateMenu');


//Avis Route

Route::get('/avis', 'API\AvisController@GetAllAvis');

Route::get('/avis/{id}', 'API\AvisController@GetAvis')->where('name', '[0-9]+');

Route::delete('/delete-avis/{id}', 'API\AvisController@DeleteAvis');

Route::get('/avisResto/{id}', 'API\AvisController@GetRestoAvis');

Route::get('/avisUser/{id}', 'API\AvisController@GetUserAvis');

Route::get('/avisUserResto/{id_user}/{id_resto}', 'API\AvisController@GetRestoUserAvis');

