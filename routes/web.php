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

Route::get('/beranda', 'MasterController@index');
Route::get('/pengguna', 'PenggunaController@index');
Route::get('/pengguna/create', 'PenggunaController@create');
Route::post('/pengguna', 'PenggunaController@store');
Route::get('/pengguna/{id}/edit', 'PenggunaController@edit');
Route::put('/pengguna/{id}', 'PenggunaController@update');
Route::delete('/pengguna/{id}', 'PenggunaController@destroy');
Route::get('/pengguna/trash', 'PenggunaController@trash');
Route::get('/pengguna/trash/{id}/restore', 'PenggunaController@restore');
Route::get('/pengguna/trash/{id}/forceDelete', 'PenggunaController@forceDelete');
Route::get('/tugas', 'TugasController@index');
Route::get('/tugas/{pengguna_id}', 'TugasController@list');
Route::get('/tugas/{pengguna_id}/done', 'TugasController@done');
Route::get('/tugas/{pengguna_id}/create', 'TugasController@create');
Route::post('/tugas/{pengguna_id}', 'TugasController@store');
Route::delete('/tugas/{pengguna_id}/{tugas_id}', 'TugasController@destroy');
Route::get('/tugas/{pengguna_id}/{tugas_id}/retask', 'TugasController@retask');
Route::get('/tugas/{pengguna_id}/{tugas_id}/forceDelete', 'TugasController@forceDelete');
Route::get('/tugas/{pengguna_id}/{tugas_id}/edit', 'TugasController@edit');
Route::put('/tugas/{pengguna_id}/{tugas_id}', 'TugasController@update');