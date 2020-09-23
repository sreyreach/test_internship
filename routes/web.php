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
    return view('index');
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

//POST JOB

Route::get('/view', 'PostJobController@view');
Route::get('/', 'PostJobController@hotjob');
Route::get('/view_categories', 'PostJobController@categories');
Route::get('/show/{id}', 'PostJobController@show');
Route::get('edit/postjob/{id}', 'PostJobController@edit');
Route::post('update/postjob/{id}', 'PostJobController@update');
Route::get('/destroy/{id}','PostJobController@destroy');

Route::post('/search', 'PostJobController@search');
Auth::routes();
Route::get('/my_post', 'PostJobController@profile');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('postjob', 'PostJobController');
// Route::post('postjob','PostJobController@store');


// Route::get('/edit', function () {
//     return view('update_userprofile');
// });

//USer

Route::resource('user', 'UserController@update');
Route::get('edit/user/{id}', 'UserController@edit');
Route::post('update/user/{id}', 'UserController@update');

//Job_Type/category
Route::get('/add_category', function () {
    return view('catagory.job_title');
});
Route::resource('category','CategoryController');
Route::get('/home', 'CategoryController@view');

// Route::get('edit/postjob/{id}', 'CategoryController@edit');

//Location
Route::get('/add_location', function () {
    return view('catagory.location');
});
Route::resource('location','LocationController');
Route::get('/home', 'LocationController@view');

//Job Type
Route::get('/add_job_type', function () {
    return view('catagory.job_type');
});
Route::resource('job_type','JobTypeController');
Route::get('/home', 'JobTypeController@view');

//admine
Route::resource('user','UserController'); 
Auth::routes();
Route::resource('admin','AdminController');
Route::get('/user/{id}/destroy', 'AdminController@destroy');

//employer
Route::resource('employer','EmployerController');
Route::get('/employer/{id}/destroy', 'AdminController@destroy');

//Admin Post
Route::resource('post', 'AdminPostController');

//Admin Category
Route::resource('admincategory','AdminCategoryController');

//Admin Location
Route::resource('adminlocation','AdminLocationController');
