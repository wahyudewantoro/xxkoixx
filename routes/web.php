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



/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

// Route::get('logout', 'App\Http\Controllers\Auth\LoginController@logout');
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::get('/home', 'HomeController@index')->name('home');

    Route::resource('role', 'RoleController');
    Route::get('role/{role}/hapus', 'RoleController@destroy')->name('role.hapus');
    Route::resource('permission', 'PermissionController');
    Route::get('permission/{role}/hapus', 'PermissionController@destroy')->name('permission.hapus');
    Route::resource('account', 'PenggunaController')->only(['index', 'edit', 'update']);


    Route::resource('jenisikan', 'JenisIkanController');
    Route::resource('biaya', 'BiayaController');
    Route::resource('event', 'EventController')->only(['index', 'edit', 'update']);
    Route::resource('pendaftaran', 'PendaftaranController');
    Route::get('pendaftaran/kartu/{pendaftaran}', 'PendaftaranController@kartuIkan')->name('pendaftaran.kartu');
    Route::get('pendaftaran/stiker/{pendaftaran}', 'PendaftaranController@stikerIkan')->name('pendaftaran.stiker');
    Route::get('image/{filename}', 'ImageController@displayImage')->name('image.displayImage');

    Route::resource('tagihan', 'TagihanController')->only('index');
    Route::get('tagihan/invoice', 'TagihanController@cetakInvoice')->name('tagihan.invoice');
    Route::get('tagihan/payletter', 'TagihanController@payletter')->name('tagihan.payletter');
    Route::get('tagihan/lunas', 'TagihanController@lunas')->name('tagihan.lunas');
    Route::post('tagihan/payletter/proses', 'TagihanController@payLetterPproses')->name('tagihan.payletter.proses');
    Route::post('tagihan/bayar', 'TagihanController@bayarTagihan')->name('tagihan.bayar');

    Route::get('tagihan/surplusdefisit', 'TagihanController@surplusDefisitPath')->name('tagihan.surplus.defisit');
    Route::get('tagihan/surplusdefisit/{surplus}', 'TagihanController@surplusDefisitproses')->name('tagihan.surplus.proses');
    

    Route::resource('ikan', 'IkanController')->except(['destroy','edit','create','store']);
    Route::get('ikan/{ikan}/hapus', 'IkanController@destroy')->name('ikan.hapus');
});
