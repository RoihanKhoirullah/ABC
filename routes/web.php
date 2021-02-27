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
    return view('auth.login');
});
Route::get('/login', function () {
    return view('auth.login');
});

// TENTANG
Route::get('/home/tentang' , 'TentangController@index')->name('tentang.index');
Route::get('/home/tentang-create' , 'TentangController@create')->name('tentang.create');
Route::post('/tentang-store' , 'TentangController@store')->name('tentang.store');
Route::get('/home/tentang-edit/{id}' , 'TentangController@edit')->name('tentang.edit');
Route::put('/tentang-update/{id}' , 'TentangController@update')->name('tentang.update');
Route::get('/tentang-delete/{id}' , 'TentangController@destroy')->name('tentang.delete');

// Galeri
Route::get('/home/galeri' , 'GaleriController@index')->name('galeri.index');
Route::get('/home/galeri-create' , 'GaleriController@create')->name('galeri.create');
Route::post('/galeri-store' , 'GaleriController@store')->name('galeri.store');
Route::get('/home/galeri-edit/{id}' , 'GaleriController@edit')->name('galeri.edit');
Route::put('/galeri-update/{id}' , 'GaleriController@update')->name('galeri.update');
Route::get('/galeri-delete/{id}' , 'GaleriController@destroy')->name('galeri.delete');

// Data Penggung
Route::get('/home/data-pengguna' , 'DatapenggunaController@index')->name('data-pengguna.index');
Route::get('/delete/{id}' , 'DatapenggunaController@destroy')->name('delete');

// Login
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

