<?php

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


Route::get('/', 'BossConroller@index');
Route::get('/portfolio', 'BossConroller@portfolio');
Route::get('/services', 'BossConroller@services');
Route::get('/blog_details/{id}', 'BossConroller@blog_details');

/**
 * Start admin
 */
Route::get('/admin-panel', 'adminControllers@index');
Route::post('/admin-login-cheak', 'adminControllers@Admin_login_cheak');

/**
 * End admin
 */

/**
 * Start superadmin
 */
Route::get('/dashboard', 'SuperAdminController@index');
Route::get('/logout', 'SuperAdminController@logout');
Route::get('/add_category', 'SuperAdminController@add_category');
Route::get('/manage_category', 'SuperAdminController@manage_category');
Route::get('/Unpulished_category/{id}', 'SuperAdminController@Unpulished_category');
Route::get('/pulished_category/{id}', 'SuperAdminController@pulished_category');
Route::get('/delete_category/{id}', 'SuperAdminController@delete_category');
Route::get('/delete_category/{id}', 'SuperAdminController@delete_category');
Route::get('/edit_category/{id}', 'SuperAdminController@edit_category');
Route::get('/add_blog', 'SuperAdminController@add_blog');
Route::post('/save_blog', 'SuperAdminController@save_blog');
Route::post('/update_category', 'SuperAdminController@update_category');
Route::get('/manage_blog', 'SuperAdminController@manage_blog');
Route::post('/save_category', 'SuperAdminController@save_category');
/**
 * End superadmin
 */














