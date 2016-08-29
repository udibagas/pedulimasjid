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

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function() {
    Route::resource('/category', 'CategoryController', ['except' => ['show']]);
    Route::get('/donasi/admin', 'DonasiController@admin');
    Route::resource('/donasi', 'DonasiController', ['except' => ['index']]);
    Route::get('/inbox/admin', 'InboxController@admin');
    Route::resource('/inbox', 'InboxController', ['except' => ['index']]);
    Route::resource('/outbox', 'OutboxController', ['only' => ['create', 'store', 'delete']]);
    Route::get('/masjid/admin', 'MasjidController@admin');
    Route::resource('/masjid', 'MasjidController');
    Route::resource('/menu', 'MenuController', ['except' => ['show']]);
    Route::get('/post/admin', 'PostController@admin');
    Route::resource('/post', 'PostController', ['except' => ['index', 'show']]);
    Route::resource('/slider', 'SliderController');
    Route::get('/lokasi', 'LokasiController@index');
});

Route::resource('/category', 'CategoryController', ['only' => ['show']]);
Route::resource('/donasi', 'DonasiController', ['only' => ['index']]);
Route::resource('/inbox', 'InboxController', ['only' => ['index']]);
Route::get('/pesan', 'InboxController@index');
Route::get('/hubungi-kami', 'InboxController@index');
Route::get('/kontak-kami', 'InboxController@index');
Route::get('/kontak', 'InboxController@index');
Route::resource('/masjid', 'MasjidController', ['only' => ['index', 'show']]);
Route::resource('/post', 'PostController', ['only' => ['index', 'show']]);

Route::auth();
