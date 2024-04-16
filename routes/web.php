<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ObjekWisataController;
use App\Http\Controllers\PengelolaController;
use App\Http\Controllers\TransaksiController;

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

Route::get('/', [LandingController::class,'index']);

Route::get('/about',[LandingController::class,'about']);

Route::get('/destination', [LandingController::class,'destination']);

Route::get('/detail/{id}', [LandingController::class,'detail'])->name('detail');

Route::get('/contact', [LandingController::class,'contact']);

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin
Route::group(['middleware' => ['role:Admin','auth']],function(){

    Route::resource('pengelola',PengelolaController::class);

    Route::get('/pilihpengelola/{id}',[ObjekWisataController::class,'pilihPengelola'])->name('pilihpengelola');
    Route::put('/pilihpengelola/{id}',[ObjekWisataController::class,'tambahPengelola'])->name('tambahpengelola');

    Route::resource('kategori',KategoriController::class);
});

//pengelola
Route::group(['middleware' => ['role:Admin|Pengelola','auth']],function(){

    Route::get('/ubahpassword/{id}',[PengelolaController::class,'ubahPassword'])->name('ubahpassword');
    Route::put('/ubahpassword/{id}',[PengelolaController::class,'updatePassword'])->name('updatepassword');

    Route::resource('objekwisata',ObjekWisataController::class);

});







