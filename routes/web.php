<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

//FRONTEND
Route::get('/', 'FrontendController@index');
Route::get('/cektanggal', 'FrontendController@cektanggal');
Route::get('/cektiket', 'FrontendController@cektiket');
Route::get('/cekjadwal', 'FrontendController@cekjadwal');
Route::get('/before-order', 'FrontendController@before_order');
Route::get('/after-order', 'FrontendController@after_order');

//BACKEND
Route::get('/dashboard', 'BackendController@index');
Route::get('/jadwal', 'BackendController@jadwal');
Route::get('/tambah-jadwal', 'BackendController@tambah_jdwl');
Route::post('/create_jdwl', 'BackendController@create_jdwl');
Route::get('/edit-jadwal/{id}', 'BackendController@edit_jdwl');
Route::post('/update_jdwl/{id}', 'BackendController@update_jdwl');
Route::get('/delete_jdwl/{id}', 'BackendController@delete_jdwl');
