<?php
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('people', 'Api\PersonController@show');
Route::get('people/{id}', 'Api\PersonController@getPerson');
Route::post('people', 'Api\PersonController@newPerson');
Route::put('people/{id}', 'Api\PersonController@updatePerson');
Route::delete('people/{id}', 'Api\PersonController@deletePerson');
