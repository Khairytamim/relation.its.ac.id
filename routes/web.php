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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
	Route::get('/', 'AcaraController@index')->name('admin');
	Route::get('/list', 'AcaraController@list')->name('listadmin');
	Route::get('/confirm', 'AcaraController@confirm')->name('konfirmasiadmin');

});

Route::group(['prefix' => 'acara'], function () {
	Route::get('/', 'AcaraController@home')->name('acara');
	Route::post('/add', 'AcaraController@add')->name('addacara');
	Route::post('/update', 'AcaraController@update')->name('updateacara');
	Route::post('/updateemail', 'AcaraController@updateemail')->name('updateemailacara');
	Route::post('/delete', 'AcaraController@delete')->name('deleteacara');
	Route::post('/jadwal', 'AcaraController@jadwal')->name('jadwalajax');
	Route::get('/lihat', 'AcaraController@lihat')->name('lihatacara');
	Route::post('/notes', 'AcaraController@notes')->name('notes');
	Route::get('/panduan', 'HomeController@panduan')->name('panduan');


});

Route::group(['prefix' => 'user'], function () {
	Route::get('/', 'AcaraController@user')->name('user');
});

Route::group(['prefix' => 'cek'], function () {
	Route::get('/', 'HomeController@cek');
});

Route::group(['prefix' => 'calendar'], function () {
	Route::get('/', 'AcaraController@calendar')->name('calendar');
});
