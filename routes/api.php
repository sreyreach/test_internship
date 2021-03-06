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
Route::get('/user/getDownloadProfile/{id}/{updated_at}','API\UserControler@getDownloadphoto');
Route::Post('/user/changePassword','API\UserControler@changePassword');

//POST_JOB
Route::post('/postjob/create','API\PostJobControler@store');
Route::post('/postjob/update/{id}','API\PostJobControler@update'); 
Route::get('/postjob/show/{id}','API\PostJobControler@show'); 
Route::get('/postjob/read','API\PostJobControler@index'); 
Route::get('/postjob/delete/{id}','API\PostJobControler@destroy'); 

Route::get('/postjob/user/{id}','API\PostJobControler@userId');
Route::get('/postjob/readtypejob/{title}','API\PostJobControler@readTypeJob');
Route::get('/postjob/getdownload/{id}/{updated_at}','API\PostJobControler@getDownload'); 

//Location
Route::get('/getlocation','API\PostJobControler@getLocation');
//Category
Route::get('/getcategory','API\PostJobControler@getCategory');
//Job Type
Route::get('/getjobtype','API\PostJobControler@getJobtype');

//TestController
Route::get('/test/user/show','API\TestJobControler@index');
Route::get('/test/post/byUserId/{id}','API\TestJobControler@show');

Route::group(["middleware" => ['auth:api']], function () {

    //USER
    // Route::get('/user','API\UserControler@index');
    // Route::get('/user/{id}','API\UserControler@show');
    // Route::post('/user/update/{id}','API\UserControler@update');
    // Route::post('/user/updateprofile/{id}','API\UserControler@updateProfile');
    

    //POST_JOB
    // Route::post('/postjob/create','API\PostJobControler@store');
    // Route::post('/postjob/update/{id}','API\PostJobControler@update'); 
    // Route::get('/postjob/show/{id}','API\PostJobControler@show'); 
    // Route::get('/postjob/read','API\PostJobControler@index'); 
    // Route::get('/postjob/delete/{id}','API\PostJobControler@destroy'); 

    // Route::get('/postjob/user/{id}','API\PostJobControler@userId');
    // Route::get('/postjob/readtypejob/{title}','API\PostJobControler@readTypeJob');
   


});

//get data for filter
//Location
Route::get('/getLocation','API\GetDataForFilterController@getLocation');
//Category
Route::get('/getCategory','API\GetDataForFilterController@getCategory');
//Job Type
Route::get('/getJobtype','API\GetDataForFilterController@getJobtype');
