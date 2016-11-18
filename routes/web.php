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
Route::get('/logout','SuperAdminController@logout');

//Category Portion
Route::get('/dashboard','SuperAdminController@index');
Route::get('/add-category','SuperAdminController@add_category');
Route::post('/save-category','SuperAdminController@save_category');
Route::get('/manage-category','SuperAdminController@manage_category');
Route::get('/unpublished/{id}','SuperAdminController@unpublished_category');
Route::get('/published/{id}','SuperAdminController@published_category');
Route::get('/delete-category/{id}','SuperAdminController@delete_category');
Route::get('/edit-category/{id}','SuperAdminController@edit_category');
Route::post('/update-category','SuperAdminController@update_category');

//Blog Portion
Route::get('/add-blog','SuperAdminController@add_blog');
Route::post('/save-blog','SuperAdminController@save_blog');
Route::get('/manage-blog','SuperAdminController@manage_blog');
Route::get('/unpublished-blog/{id}','SuperAdminController@unpublished_blog');
Route::get('/published-blog/{id}','SuperAdminController@published_blog');
Route::get('/delete-blog/{id}','SuperAdminController@delete_blog');


/*
 * End SuperAdmin controller
 */
