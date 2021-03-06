<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */

//Route::get('/posts', function () {
//    return view('welcome');
//});

Route::get('/posts', 'IndexController@index'); // Вывод категорий и связаных с каждой из них постов

Route::group(['prefix' => 'admin/uploadimage'], function () {
    Route::get('/', 'UploadimageController@index'); //Форма загрузки картинки
    Route::post('/', 'UploadimageController@store'); //Сохранение картинки
});
Route::get('admin/gallery', 'UploadimageController@showgallery'); //Галерея

Route::group(['prefix' => 'admin/categories'], function () {
    Route::get('/', 'CategoryController@index')->name('cat_admin');
    Route::post('/', 'CategoryController@store');
    Route::delete('delete/{category}', 'CategoryController@destroy');
    Route::get('/{cat}', 'CategoryController@edit');
    Route::post('/{cat}', 'CategoryController@save');
    Route::get('/editcat/{category}', 'CategoryController@edit');
    Route::post('/editcat/{category}', 'CategoryController@save');
});

Route::group(['prefix' => 'admin/posts'], function () {
    Route::get('/', 'PostController@index')->name('post_admin');
    Route::post('/', 'PostController@store');
    Route::delete('delete/{post}', 'PostController@destroy');

    Route::get('/editpost/{post}', 'PostController@edit');
    Route::post('/editpost/{post}', 'PostController@save');
});
