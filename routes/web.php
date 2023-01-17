<?php

use App\Http\Controllers\KategoriController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LandingController;
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin
Route::group(['middleware' => ['role:Admin','auth']],function(){
    
    Route::resource('pengelola',PengelolaController::class);

    Route::get('/pilihpengelola/{id}',[ObjekWisataController::class,'pilihPengelola'])->name('pilihpengelola');
    Route::put('/pilihpengelola/{id}',[ObjekWisataController::class,'tambahPengelola'])->name('tambahpengelola');
    
    Route::resource('kategori',KategoriController::class);
});

Route::group(['middleware' => ['role:Admin|Pengelola','auth']],function(){

    Route::get('/ubahpassword/{id}',[PengelolaController::class,'ubahPassword'])->name('ubahpassword');
    Route::put('/ubahpassword/{id}',[PengelolaController::class,'updatePassword'])->name('updatepassword');
    
    Route::resource('objekwisata',ObjekWisataController::class);

    Route::put('/konfirmasibayar/{id}',[TransaksiController::class,'konfirmasibayar'])->name('konfirmasibayar');
});

Route::group(['middleware' => ['role:Pengunjung','auth']],function(){

    Route::put('/datadiri/{id}',[TransaksiController::class,'datadiri'])->name('datadiri');
    Route::get('/dashboard-user',[LandingController::class,'dashboard'])->name('dashboard');
    Route::put('/databayar/{id}',[TransaksiController::class,'databayar'])->name('databayar');
    Route::put('/bayar/{id}',[TransaksiController::class,'bayar'])->name('bayar');
});

Route::group(['middleware' => ['role:Pengunjung|Admin|Pengelola','auth']],function(){

    Route::put('/unduhinvoice/{id}',[TransaksiController::class,'unduhinvoice'])->name('unduhinvoice');
    Route::resource('transaksi',TransaksiController::class);
});







