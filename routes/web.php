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

Route::get('/tambah', function () {
    return view('tambah');
});

Route::get('/', 'FoodController@index');
Route::get('/transaksi', 'FoodController@transaksi');
Route::post('/proses_tambah', 'FoodController@tambah');