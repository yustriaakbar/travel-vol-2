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
//Route::get('/cektanggal', 'FrontendController@cektanggal');
Route::get('/cektiket', 'FrontendController@cektiket');
Route::get('/cekjadwal', 'FrontendController@cekjadwal');
Route::get('/before-order', 'FrontendController@before_order');
Route::get('/after-order', 'FrontendController@after_order');
Route::post('/checkout', 'FrontendController@order');
Route::get('/payment/{id}', 'FrontendController@pay');
Route::get('/konfirmasi/{id}', 'FrontendController@confirm');
Route::post('/create_confirm', 'FrontendController@create_cfrm');
Route::get('/order', 'FrontendController@tiket');
Route::get('/etiket/{id}', 'FrontendController@cetak');
Route::get('/profile', 'FrontendController@profil');
//Route::get('/ganti-password', 'FrontendController@change_password');
//Route::get('/edit-profile', 'FrontendController@change_account');
Route::post('/update_profile', 'FrontendController@updateprofile');

Route::group(['middleware' => ['admin']], function () {
//BACKEND
Route::get('/dashboard', 'BackendController@index');
Route::get('/daftarkonfirmasi', 'BackendController@list_confirm');
Route::get('/daftartiket', 'BackendController@list_tiket');
Route::get('/etiket/{id}', 'BackendController@cetak_admin');
Route::get('/laporan', 'BackendController@manajemen_laporan');
Route::get('/laporan/filter', 'BackendController@manajemen_laporan_filter');
Route::get('/laporan/download', 'BackendController@download_laporan');
//BACKEND JADWAL
Route::get('/jadwal', 'BackendController@jadwal');
Route::get('/tambah-jadwal', 'BackendController@tambah_jdwl');
Route::post('/create_jdwl', 'BackendController@create_jdwl');
Route::get('/edit-jadwal/{id}', 'BackendController@edit_jdwl');
Route::post('/update_jdwl/{id}', 'BackendController@update_jdwl');
Route::get('/delete_jdwl/{id}', 'BackendController@delete_jdwl');
//BACKEND ASAL
Route::get('/asal-tujuan', 'BackendController@asal_tujuan');
Route::get('/tambah-asal', 'BackendController@tambah_asal');
Route::post('/create_asal', 'BackendController@create_asal');
Route::get('/edit-asal/{id}', 'BackendController@edit_asal');
Route::post('/update_asal/{id}', 'BackendController@update_asal');
Route::get('/delete_asal/{id}', 'BackendController@delete_asal');
//BACKEND TUJUAN
Route::get('/tambah-tujuan', 'BackendController@tambah_tujuan');
Route::post('/create_tujuan', 'BackendController@create_tujuan');
Route::get('/edit-tujuan/{id}', 'BackendController@edit_tujuan');
Route::post('/update_tujuan/{id}', 'BackendController@update_tujuan');
Route::get('/delete_tujuan/{id}', 'BackendController@delete_tujuan');
//BACKEND MOBIL
Route::get('/mobil', 'BackendController@mobil_travel');
Route::get('/tambah-mobil', 'BackendController@tambah_mobil');
Route::post('/create_mobil', 'BackendController@create_mobil');
Route::get('/edit-mobil/{id}', 'BackendController@edit_mobil');
Route::post('/update_mobil/{id}', 'BackendController@update_mobil');
Route::get('/delete_mobil/{id}', 'BackendController@delete_mobil');
//BACKEND BANK
Route::get('/daftarbank', 'BackendController@bank');
Route::get('/tambah-bank', 'BackendController@tambah_bank');
Route::post('/create_bank', 'BackendController@create_bank');
Route::get('/edit-bank/{id}', 'BackendController@edit_bank');
Route::post('/update_bank/{id}', 'BackendController@update_bank');
Route::get('/delete_bank/{id}', 'BackendController@delete_bank');
//BACKEND ORDER
Route::get('/daftarorder', 'BackendController@list_order');
Route::get('/vieworder/{id}', 'BackendController@view_order');
Route::post('/update-order/{id}', 'BackendController@update_order');
Route::get('/viewjadwal/{id}', 'BackendController@view_jadwal');
//BACKEND USER
Route::get('/pelanggan', 'BackendController@list_pelanggan');
Route::get('/listadmin', 'BackendController@list_admin');
Route::get('/tambah-admin', 'BackendController@tambah_admin');
Route::post('/buat_admin', 'BackendController@create_admin');
Route::get('/delete_pelanggan/{id}', 'BackendController@delete_pelanggan');
});