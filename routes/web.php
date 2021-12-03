<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

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
    return Redirect::route('halaman_utama.index');
});

Route::get('/dashboard', function () {
    return view('layout.main');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::resource('kriteria_types', 'App\Http\Controllers\JenisKriteriaController');
    Route::resource('selisih', 'App\Http\Controllers\SelisihController');
    Route::resource('kriteria', 'App\Http\Controllers\KriteriaController');
    Route::resource('sub_kriteria', 'App\Http\Controllers\SubKriteriaController');
    Route::post('storesubkriteria', 'App\Http\Controllers\KriteriaController@storesubkriteria')->name('storesubkriteria');
    Route::get('editsubkriteria/{id}', 'App\Http\Controllers\KriteriaController@editsubkriteria')->name('editsubkriteria');
    Route::put('updatesubkriteria/{id}', 'App\Http\Controllers\KriteriaController@updatesubkriteria')->name('updatesubkriteria');
    Route::delete('destroysubkriteria/{id}', 'App\Http\Controllers\KriteriaController@destroysubkriteria')->name('destroysubkriteria');
    Route::resource('alternatif', 'App\Http\Controllers\AlternatifController');
    Route::resource('penilaian', 'App\Http\Controllers\PenilaianController');
    Route::resource('users', 'App\Http\Controllers\UserController');
    Route::get('profile_matching', 'App\Http\Controllers\PenilaianController@profile_matching')->name('profile_matching');
}); 

Route::resource('halaman_utama', 'App\Http\Controllers\HalamanUtamaController');
Route::get('data_mobil', 'App\Http\Controllers\VisitorController@data_mobil')->name('data_mobil');
Route::get('detail_data_mobil/{id}', 'App\Http\Controllers\VisitorController@detail_data_mobil')->name('detail_data_mobil');
Route::get('datapenilaian', 'App\Http\Controllers\VisitorController@datapenilaian')->name('datapenilaian');
Route::get('profilematchingvisitor', 'App\Http\Controllers\VisitorController@profilematchingvisitor')->name('profilematchingvisitor');

require __DIR__.'/auth.php';
