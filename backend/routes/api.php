<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'App\Http\Controllers\AuthController@login');
    Route::post('signup', 'App\Http\Controllers\AuthController@signup');
    Route::post('logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthController@me');

});

Route::apiResource('/user/company', 'App\Http\Controllers\Api\UserCompanyController');
Route::apiResource('/client', 'App\Http\Controllers\Api\ClientController');
Route::apiResource('/client-category', 'App\Http\Controllers\Api\ClientCategoryController');
Route::apiResource('/product', 'App\Http\Controllers\Api\ProductController');
Route::apiResource('/line', 'App\Http\Controllers\Api\LineController');
Route::apiResource('/document', 'App\Http\Controllers\Api\DocumentController');