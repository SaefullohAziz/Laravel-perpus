<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home', 'HomeController@pinjam')->name('pinjam');

Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function(){
	Route::resource('/users', 'UserController', ['except' => ['show', 'create','store']]); 
	Route::get('/impersionate/user/{id}', 'ImpersionateController@index')->name('impersionate'); 
});
Route::get('/admin/impersionate/destroy', 'Admin\ImpersionateController@destroy')->name('admin.impersionate.destroy'); 

Route::get('/buku', 'BukuController@index'); 
Route::post('/buku/create', 'BukuController@create'); 
Route::get('/buku/edit/{id}', 'BukuController@edit');
Route::post('/buku/update', 'BukuController@update');
Route::get('/buku/destroy/{id}', 'BukuController@destroy')->name('hapusBuku'); 

Route::get('/peminjaman', 'PeminjamanController@index');
Route::get('/peminjaman/cek/{id}', 'PeminjamanController@cek'); 
Route::get('/peminjaman/konfir/{id}', 'PeminjamanController@konfir');