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

// Auth::routes();
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin','middleware' => 'auth'] , function () {
	Route::get('/', function(){
		return redirect(route('konfirmasiadmin'));
	});
	Route::get('/confirmed', 'AcaraController@list')->name('listadmin');
	Route::get('/confirmation', 'AcaraController@confirm')->name('konfirmasiadmin');
	Route::post('/acara/notes', 'AcaraController@notes')->name('notes');
	Route::post('/acara/delete', 'AcaraController@delete')->name('deleteacara');
	Route::post('/acara/update', 'AcaraController@update')->name('updateacara');
});

Route::group(['prefix' => 'acara'], function () {
	Route::get('/', 'AcaraController@home')->name('acara');
	Route::post('/add', 'AcaraController@add')->name('addacara');
	Route::post('/updateemail', 'AcaraController@updateemail')->name('updateemailacara');
	Route::post('/jadwal', 'AcaraController@jadwal')->name('jadwalajax');
	Route::get('/lihat', 'AcaraController@lihat')->name('lihatacara');
	Route::get('/panduan', 'HomeController@panduan')->name('panduan');


});

Route::group(['prefix' => 'admin/users'], function () {
	Route::get('/', 'UserController@index')->name('users');
	Route::post('/add', 'UserController@add')->name('adduser');

});

Route::get('/event/detail', 'AcaraController@event')->name('getevent');

Route::group(['prefix' => 'user'], function () {
	Route::get('/', 'AcaraController@user')->name('user');
});

Route::group(['prefix' => 'cek'], function () {
	Route::get('/', 'HomeController@cek');
});

Route::group(['prefix' => 'calendar'], function () {
	Route::get('/', 'AcaraController@calendar')->name('calendar');
});
