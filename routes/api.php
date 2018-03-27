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
