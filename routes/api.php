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
Route::post('/login', 'API\AuthControler@login');
Route::post('/register', 'API\AuthControler@register');

//USER
Route::get('/user','API\UserControler@index');
Route::get('/user/{id}','API\UserControler@show');
Route::post('/user/update/{id}','API\UserControler@update');
Route::post('/user/updateprofile/{id}','API\UserControler@updateProfile');
Route::get('/user/getDownloadProfile/{id}','API\UserControler@getDownloadProfile');

Route::group(["middleware" => ['auth:api']], function () {
   
});
