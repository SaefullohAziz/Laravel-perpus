<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@pinjam')->name('pinjam');
Route::get('/home/cari', 'HomeController@cari');
Route::get('/peminjaman/form/{id}', 'HomeController@form');
Route::get('/peminjaman/riwayat/{id}', 'PeminjamanController@riwayat');
Route::get('/peminjaman/perpanjangan/{id}', 'PeminjamanController@perpanjangan');

Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function(){
	Route::resource('/users', 'UserController', ['except' => ['show', 'create','store']]); 
	Route::get('/impersionate/user/{id}', 'ImpersionateController@index')->name('impersionate'); 
});
Route::get('/admin/impersionate/destroy', 'Admin\ImpersionateController@destroy')->name('admin.impersionate.destroy'); 

Route::get('/buku', 'BukuController@index')->middleware(['auth', 'auth.admin']); 
Route::post('/buku/create', 'BukuController@create')->middleware(['auth', 'auth.admin']); 
Route::get('/buku/edit/{id}', 'BukuController@edit')->middleware(['auth', 'auth.admin']);
Route::post('/buku/update', 'BukuController@update')->middleware(['auth', 'auth.admin']);
Route::get('/buku/destroy/{id}', 'BukuController@destroy')->name('hapusBuku')->middleware(['auth', 'auth.admin']); 

Route::get('/peminjaman', 'PeminjamanController@index')->middleware(['auth', 'auth.admin']);
Route::get('/peminjaman/cek/{id}', 'PeminjamanController@cek')->middleware(['auth', 'auth.admin']); 
Route::get('/peminjaman/konfir/{id}', 'PeminjamanController@konfir')->middleware(['auth', 'auth.admin']);