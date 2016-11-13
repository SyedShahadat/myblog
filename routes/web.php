<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});


/*
 * Fron End Controller
 */
Route::get('/','WelcomeController@index');
Route::get('/portfolio','WelcomeController@portfolio');
Route::get('/services','WelcomeController@services');
Route::get('/contact-us','WelcomeController@contact_us');
/*
 * End Frontend controller
 */



/*
 * Star Admin Controller
 */
Route::get('/admin-area','AdminController@index');
Route::post('/admin-login-check','AdminController@login_check');

/*
 * End Admin Controller
 */


/*
 * Start SuperAdmin Controller
 */
Route::get('/dashboard','SuperAdminController@index');
Route::get('/add-category','SuperAdminController@add_category');
Route::post('/save-category','SuperAdminController@save_category');
Route::get('/manage-category','SuperAdminController@manage_category');
Route::get('/logout','SuperAdminController@logout');

/*
 * End SuperAdmin controller
 */