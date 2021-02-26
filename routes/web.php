<?php

use Illuminate\Support\Facades\Route;

//frontend


Route::get('/', function () {
    return view('frontend.welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('test',function(){
    return view('halo');

});

use App\Http\Controllers\ProvinsiController;
Route::resource('provinsi',ProvinsiController::class);

use App\Http\Controllers\KotaController;
Route::resource('kota',KotaController::class);

use App\Http\Controllers\KecamatanController;
Route::resource('kecamatan',KecamatanController::class);

use App\Http\Controllers\KelurahanController;
Route::resource('kelurahan',KelurahanController::class);

use App\Http\Controllers\RwController;
Route::resource('rw',RwController::class);

use App\Http\Controllers\KasusController;
Route::resource('kasus',KasusController::class);

Route::get('admin',function(){
    return view('utama');

});

use App\Http\Controllers\FrontendController;
Route::resource('/',FrontendController::class);