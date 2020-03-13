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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();



Auth::routes();



Route::group(['middleware'=>'auth'],function(){

    Route::get('/dashboard', 'dashboardController@index')->name('dashboard');

    Route::resource('/categories', 'CategoriesController');
    
    Route::resource('/Tags', 'TagsController');
    

    
    Route::resource('/posts', 'PostsController');
    
    Route::get('/trashed-posts', 'PostsController@trashed')->name('trashed.index');
    
    Route::get('/trashed-posts/{id}', 'PostsController@Restore')->name('trashed.Restore'); 
});
route::middleware(['auth','admin'])->group(function(){
    Route::get('/users', 'UserController@index')->name('users.index');
    // Route::get('/users/create', 'UserController@create')->name('users.create');
    Route::post('/users/{user}/make-admin', 'UserController@makeAdmin')->name('users.make-admin');
    Route::post('/users/{user}/downgrade', 'UserController@downgrade')->name('users.downgrade');;

});


route::middleware(['auth'])->group(function(){
    Route::get('/users/{user}/profile', 'UserController@edit')->name('users.edit');
    Route::post('/users/{user}/profile', 'UserController@update')->name('users.update');
    // Route::get('/users/create', 'UserController@create')->name('users.create');
    // Route::post('/users/{user}/make-admin', 'UserController@makeAdmin')->name('users.make-admin');
    // Route::post('/users/{user}/downgrade', 'UserController@downgrade')->name('users.downgrade');;

});