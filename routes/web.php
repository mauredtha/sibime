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
Route::get('/', 'AuthController@showFormLogin')->name('login');
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showFormRegister')->name('register');
Route::post('register', 'AuthController@register');
 
Route::group(['middleware' => 'auth'], function () {
 
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('logout', 'AuthController@logout')->name('logout');
    Route::resource('workbooks', 'BukuKerjasController');
    Route::put('/workbooks/{id}/edit', 'BukuKerjasController@update');
    Route::get('buku_kerja_satu', 'BukuKerjasController@buku_kerja_satu')->name('buku_kerja_satu');
    Route::get('buku_kerja_dua', 'BukuKerjasController@buku_kerja_dua')->name('buku_kerja_dua');
    Route::get('buku_kerja_tiga', 'BukuKerjasController@buku_kerja_tiga')->name('buku_kerja_tiga');
    Route::get('buku_kerja_empat', 'BukuKerjasController@buku_kerja_empat')->name('buku_kerja_empat');
    Route::resource('classes', 'ClassesController');

    Route::resource('courses', 'CoursesController');
    Route::get('komponen/{id}', 'CoursesController@showKomponen')->name('komponen');

    Route::resource('subjects', 'MaterisController');
    Route::get('list_materi/{id}', 'MaterisController@listMateri')->name('list_materi');

    Route::resource('grades', 'NilaisController');
    Route::get('list_nilai', 'NilaisController@listNilai')->name('list_nilai');

    Route::resource('users', 'AuthController');
});
