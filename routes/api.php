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
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/company-management/store','ApiCompanyController@store');
Route::get('/company-management/index','ApiCompanyController@index');
Route::post('/company-management/update/{id}','ApiCompanyController@update');
Route::delete('/company-management/delete/{id}','ApiCompanyController@destroy');

