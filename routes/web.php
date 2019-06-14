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
Route::get('/', 'PublicController@index')->name('index');
Route::get('blog/{id}','PublicController@blog')->name('blog');
Route::post('/search','PublicController@search')->name('search');
Route::get('/sortCategory/{id}','PublicController@category')->name('sortCategory');
Route::get('/author/{id}','PublicController@author')->name('author');
Route::get('/admin',function(){
	return 'admin';
})->middleware('admin');
Route::get('/user',function(){
	return 'user';
})->middleware('user');
Route::get('/editor',function(){
	return 'editor';
})->middleware('editor');

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
	Route::get('dashboard','AdminController@dashboard')->name('dashboard');
	Route::get('blogs','AdminController@blogs')->name('blogs');
	// Route::post('dashboard','PostController@addPost')->name('dashboard');
});
Route::get('/logout','auth\LoginController@logout')->name('logout');
// Route::get('/edit/{id}','AdminController@postEdit');
// Route::patch('/update/{id}','AdminController@postUpdate')->name('update');
// Route::delete('delete/{id}','AdminController@destroy')->name('delete');

Route::resource('task','PublicResourceController');
Route::resource('category','CategoryController');

Auth::routes();

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
