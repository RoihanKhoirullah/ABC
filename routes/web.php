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
Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('Admin.beranda');
});

// SISWA
Route::get('/admin/Datasiswa' , 'SiswaController@index')->name('Datasiswa');
Route::get('/admin/Createsiswa' , 'SiswaController@create')->name('Createsiswa');
Route::post('/Simpansiswa' , 'SiswaController@store')->name('Simpansiswa');
Route::get('/admin/Editsiswa/{id}' , 'SiswaController@edit')->name('Editsiswa');
Route::post('/Updatesiswa/{id}' , 'SiswaController@update')->name('Updatesiswa');
Route::get('/Deletesiswa/{id}' , 'SiswaController@destroy')->name('Deletesiswa');



