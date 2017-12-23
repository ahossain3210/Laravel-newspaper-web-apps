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

Route::get('/','HomeController@index');
Route::get('/details/{id}','HomeController@news_details');
Route::get('/category-news/{id}','HomeController@category_news');



//..............Start Admin Controller Routing..............

Route::get('/admin','AdminController@index');
Route::post('/admin-login','AdminController@admin_login_check');



//................Start Dashboard Controller Routing...........

Route::get('/dashboard','DashboardController@index');
Route::get('/logout','DashboardController@logout');

//...................Category Management............
Route::get('/add-category','DashboardController@add_category');
Route::post('/save-category','DashboardController@save_category');
Route::get('/manage-category','DashboardController@manage_category');
Route::get('/unpublish-category/{id}', 'DashboardController@unpublish_category');
Route::get('/publish-category/{id}', 'DashboardController@publish_category');
Route::get('/edit-category/{id}', 'DashboardController@edit_category');
Route::get('/delete-category/{id}', 'DashboardController@delete_category');
Route::post('/update-category', 'DashboardController@update_category');

//.............News Management...........
Route::get('/add-news','DashboardController@add_news');
Route::post('/save-news','DashboardController@save_news');
Route::get('/manage-news','DashboardController@manage_news');
Route::get('/unpublish-news/{id}', 'DashboardController@unpublish_news');
Route::get('/publish-news/{id}', 'DashboardController@publish_news');
Route::get('/unslider-news/{id}', 'DashboardController@unslider_news');
Route::get('/slider-news/{id}', 'DashboardController@slider_news');
Route::get('/unfeatured-news/{id}', 'DashboardController@unfeatured_news');
Route::get('/featured-news/{id}', 'DashboardController@featured_news');
Route::get('/unheadlined-news/{id}', 'DashboardController@unheadlined_news');
Route::get('/headlined-news/{id}', 'DashboardController@headlined_news');
Route::get('/delete-news/{id}', 'DashboardController@delete_news');
Route::get('/edit-news/{id}', 'DashboardController@edit_news');
Route::post('/update-news', 'DashboardController@update_news');