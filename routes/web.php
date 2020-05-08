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
    return redirect('/operasi');
});

Route::group(['prefix' => 'operasi'], function () {
    Route::get('/', 'JadwalOperasiController@index')->name('op.index');
    Route::get('/manage', 'JadwalOperasiController@create')->name('op.manage');
    Route::post('/manage', 'JadwalOperasiController@store')->name('op.manage.store');
    Route::get('/manage/{id}/edit', 'JadwalOperasiController@edit')->name('op.manage.edit');
    Route::put('/manage/{id}', 'JadwalOperasiController@update')->name('op.manage.update');
    Route::delete('/manage/{id}', 'JadwalOperasiController@destroy')->name('op.manage.delete');

    Route::get('/data/jadwal', 'GetDataController@dataJadwal')->name('getdata.jadwal');
});
