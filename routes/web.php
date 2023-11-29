<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\TenantController;
use App\Models\Barang;
use App\Models\Tenant;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('/barang/create', [BarangController::class, 'create'])->name('barang.create');
    Route::resource('barang', BarangController::class);
    Route::post('/barang-list', [BarangController::class, 'getBarang'])->name('barang-list');
    Route::get('/tenant', [TenantController::class, 'index']);
    Route::get('/kasir', [KasirController::class, 'index']);
});

