<?php

use Illuminate\Support\Facades\Route;

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
// Route::get('/home', function () {
//     return view('welcom');
// });
Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});
// Route::get('/profile', function () {
//     return view('profile');
// });
Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});

Route::get('/apply', function () {
    return view('form-apply-job');
});

Route::get('/view', 'PostJobController@view');
Route::get('/', 'PostJobController@hotjob');
Route::get('/view_categories', 'PostJobController@categories');
Route::get('/show/{id}', 'PostJobController@show');
Route::get('edit/{id}', 'PostJobController@edit');
Route::post('update/{id}', 'PostJobController@update');
Route::get('/destroy/{id}','PostJobController@destroy');

Route::post('/search', 'PostJobController@search');
Auth::routes();
Route::get('/profile', 'PostJobController@profile');

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('postjob', 'PostJobController');


Route::get('/edit', function () {
    return view('update_userprofile');
});