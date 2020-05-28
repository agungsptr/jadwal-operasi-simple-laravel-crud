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
Auth::routes();

// disable route '/register'
Route::match(["GET", "POST"], "/register", function(){
    return abort(404);
});

Route::get('/', 'DisplayController@index')->name('op.index');

Route::group(['prefix' => 'manage'], function () {
    Route::get('/', 'JadwalOperasiController@create')->name('op.manage');
    Route::post('/', 'JadwalOperasiController@store')->name('op.manage.store');
    Route::get('/{id}/edit', 'JadwalOperasiController@edit')->name('op.manage.edit');
    Route::put('/{id}', 'JadwalOperasiController@update')->name('op.manage.update');
    Route::delete('/{id}', 'JadwalOperasiController@destroy')->name('op.manage.delete');
});

Route::group(['prefix' => 'list'], function () {
    Route::resource('/dokter', 'ListDokterController');
    Route::resource('/tindakan', 'ListTindakanController');
    Route::resource('/status', 'ListStatusController');
});

Route::resource('user', 'UserController');
