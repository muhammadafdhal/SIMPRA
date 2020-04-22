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

Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//data siswa
Route::get('/siswa','SiswaController@tampil')->middleware('auth');
Route::get('/siswa/tambah','SiswaController@create')->middleware('auth');
Route::post('/siswa/tambah/save','SiswaController@store')->middleware('auth');
Route::get('/siswa/edit/{id}','SiswaController@edit')->middleware('auth');
Route::patch('/siswa/edit/{id}/save','SiswaController@update')->middleware('auth');
Route::delete('/siswa/delete/{id}','SiswaController@destroy')->middleware('auth');

//data siswa
Route::get('/pem','PembimbingController@tampil')->middleware('auth');
Route::get('/pem/tambah','PembimbingController@create')->middleware('auth');
Route::post('/pem/tambah/save','PembimbingController@store')->middleware('auth');
Route::get('/pem/edit/{id}','PembimbingController@edit')->middleware('auth');
Route::patch('/pem/edit/{id}/save','PembimbingController@update')->middleware('auth');
Route::delete('/pem/delete/{id}','PembimbingController@destroy')->middleware('auth');

//data pkl
Route::get('/pkl','PklController@index')->middleware('auth');
Route::get('/pkl/tambah','PklController@create')->middleware('auth');
Route::post('/pkl/tambah/save','PklController@store')->middleware('auth');
Route::get('/pkl/edit/{id}','PklController@edit')->middleware('auth');
Route::patch('/pkl/edit/{id}/save','PklController@update')->middleware('auth');
Route::delete('/pkl/delete/{id}','PklController@destroy')->middleware('auth');

//data berkas
Route::get('/berkas','BerkasController@index')->middleware('auth');
Route::get('/berkas/tambah','BerkasController@create')->middleware('auth');
Route::post('/berkas/tambah/save','BerkasController@store')->middleware('auth');
Route::get('/berkas/edit/{id}','BerkasController@edit')->middleware('auth');
Route::patch('/berkas/edit/{id}/save','BerkasController@update')->middleware('auth');
Route::delete('/berkas/delete/{id}','BerkasController@destroy')->middleware('auth');
Route::get('/berkas/verified/{id}','BerkasController@verified')->middleware('auth');
Route::get('/berkas/batal/{id}','BerkasController@notverified')->middleware('auth');

//data nilai
Route::get('/nilai','NilaiController@index')->middleware('auth');
Route::get('/nilai2','NilaiController@index2')->middleware('auth');
Route::get('/nilai/tambah/{md_id}','NilaiController@create')->middleware('auth');
Route::post('/nilai/tambah/{md_id}/save','NilaiController@store')->middleware('auth');
Route::get('/nilai/edit/{id}','NilaiController@edit')->middleware('auth');
Route::patch('/nilai/edit/{id}/save','NilaiController@update')->middleware('auth');
Route::delete('/nilai/delete/{id}','NilaiController@destroy')->middleware('auth');

//data laporan
Route::get('/laporan','LaporanController@index')->middleware('auth');
Route::get('/laporan/tambah','LaporanController@create')->middleware('auth');
Route::post('/laporan/tambah/save','LaporanController@store')->middleware('auth');
Route::get('/laporan/edit/{id}','LaporanController@edit')->middleware('auth');
Route::patch('/laporan/edit/{id}/save','LaporanController@update')->middleware('auth');
Route::delete('/laporan/delete/{id}','LaporanController@destroy')->middleware('auth');
Route::get('/laporan/download/{lp_file}', 'LaporanController@download');

//data magang detail
Route::get('/md','MagangDetailController@index')->middleware('auth');
Route::get('/md/tambah','MagangDetailController@create')->middleware('auth');
Route::post('/md/tambah/save','MagangDetailController@store')->middleware('auth');
Route::get('/md/pembimbing-pkl/{md_id}','MagangDetailController@pilihPembimbing')->middleware('auth');
Route::patch('/md/edit/{md_id}/save','MagangDetailController@update')->middleware('auth');
Route::delete('/md/delete/{md_id}','MagangDetailController@destroy')->middleware('auth');

//data pembimbing pkl
Route::get('/pbb','MagangDetailController@tampilPembimbing')->middleware('auth');
Route::post('/pbb/tambah/{md_id}/save', 'MagangDetailController@simpanPembimbing')->middleware('auth');

//data profile
Route::get('/profile','ProfileController@index')->middleware('auth');
Route::patch('/profile/{id}/save','ProfileController@update')->middleware('auth');

Route::get('/setting','ProfileController@setting')->middleware('auth');
Route::post('/setting/change','ProfileController@change')->middleware('auth');

// //try to country
// Route::get('/kabkota','CountryController@kabkota');
// Route::get('/json-kec','CountryController@kecamatan');