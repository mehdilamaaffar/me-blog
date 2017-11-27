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

Auth::routes();

# Basic pages
Route::redirect('/', '/home');
Route::get('/home', 'HomeController@index')->name('home');
Route::view('/about', 'about');
Route::view('/contact', 'contact');
Route::post('/contact/store', function () {
    return redirect()->back()->withSuccess('You message has been sent succesfuly.');
});
Route::get('/search', 'HomeController@search');

# Posts
Route::get('/post/{slug}', 'HomeController@show')->name('single.post.show');

// Categories
Route::get('/category/show/{id}', 'CategoryController@show');
Route::get('/category/{id}/posts', 'CategoryController@posts')->name('category.posts');

// admin
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'DashboardController@index');
    Route::resource('posts', 'PostsController');
    Route::resource('categories', 'CategoriesController');
});
