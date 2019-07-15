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
    return view('index');
});

Auth::routes();

Route::middleware('auth')->group(function () {
	Route::get('dashboard', function(){
		return view('dashboard');
	})->name('dashboard');

	Route::get('jadwal', 'JadwalController@index')->name('jadwal');

	Route::get('peminjaman', 'PeminjamanController@index')->name('peminjaman');

	Route::get('tambahjadwal', function () {
		return view('tambahjadwal');	
	})->name('tambahjadwal');
	Route::post('jadwaltambah', 'JadwalController@store')->name('jadwaltambah');
	Route::get('jadwal/{id}/delete', 'JadwalController@destroy');

	Route::get('pinjamsetuju/{id}', 'PeminjamanController@acc')->name('pinjamsetuju');
	Route::get('peminjaman/{id}/delete', 'PeminjamanController@destroy');
});

Route::get('/cekwaktu/{tanggal}', 'PeminjamanController@cekwaktu')->name('cekwaktu');

Route::post('daftarpinjam', 'PeminjamanController@store')->name('daftarpinjam');
