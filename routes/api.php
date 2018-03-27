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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('login', 'API\PassportController@login');
Route::post('register', 'API\PassportController@register');
Route::get('get-details-all', 'API\PassportController@getDetailsAll');

Route::post('newresto', 'API\AllRestoControllers@NewResto');
Route::post('deleteresto', 'API\AllRestoControllers@DeleteResto');
Route::get('/restos', 'API\AllRestoControllers@GetAllResto');
Route::get('/restos/{id}', 'API\AllRestoControllers@GetRestoId')->where('name', '[0-9]+');
Route::delete('/delete-resto/{id}', 'API\AllRestoControllers@DeleteResto');
Route::get('/restoName/{name}', 'API\AllRestoControllers@GetRestoName');


Route::group(['middleware' => 'auth:api'], function(){

    Route::post('get-details', 'API\PassportController@getDetails');

    Route::get('/avis', 'API\AvisController@GetAllAvis');
    Route::get('/avis/{id}', 'API\AvisController@GetAvis')->where('name', '[0-9]+');
    Route::delete('/delete-avis/{id}', 'API\AvisController@DeleteAvis');
    Route::get('/avisResto/{id}', 'API\AvisController@GetRestoAvis');
    Route::get('/avisUser/{id}', 'API\AvisController@GetUserAvis');
    Route::post('/{$id}/postcomment/', 'API\AvisController@PostAvis');

});

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

Route::post('/uprestos/{id}','AllRestoControllers@updateResto');

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

Route::get('/avisUserResto/{id_user}/{id_resto}', 'AvisController@GetRestoUserAvis');

