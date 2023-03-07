<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\TransaksiController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Transaksi
Route::middleware(['role:Super-Admin|gudang'])->prefix('pengisian-stock')->group(function () {
    Route::get('masuk', [TransaksiController::class, 'index'])->name('transaksi.masuk');
    Route::get('keluar', [TransaksiController::class, 'keluar'])->name('transaksi.keluar');
    Route::patch('update/{transaksi}', [TransaksiController::class, 'update'])->name('update.status.request');
    Route::delete('delete/{transaksi}', [TransaksiController::class, 'destroy'])->name('delete.request.stock.barang');
    Route::get('keluar/laporan/{transaksi}', [TransaksiController::class, 'cetak'])->name('transaksi.cetak.data');
});
Route::middleware(['role:Super-Admin|penjual'])->prefix('request')->group(function () {
    Route::get('add/{transaksi}', [TransaksiController::class, 'create'])->name('request.stock.barang');
    Route::post('store/{transaksi}', [TransaksiController::class, 'store'])->name('store.request.stock.barang');
});

// Barang
Route::middleware(['role:Super-Admin|gudang'])->prefix('barang')->group(function () {
    Route::get('add-persediaan/{kategoris}', [BarangController::class, 'create'])->name('add.stock-barang');
    Route::post('add-persediaan/{kategoris}', [BarangController::class, 'store'])->name('store.stock-barang');
    Route::get('edit-persediaan/{barang}', [BarangController::class, 'edit'])->name('edit.stock-barang');
    Route::patch('edit-persediaan/{barang}', [BarangController::class, 'update'])->name('update.stock-barang');
});
Route::prefix('barang')->group(function () {
    Route::get('', [BarangController::class, 'index'])->name('barang.index');
    Route::get('all-stock/{id}', [BarangController::class, 'all'])->name('view.stock-barang');
});

//Kategori , Satuan, Brand
Route::middleware(['role:Super-Admin|gudang'])->prefix('master-data')->group(function () {
    Route::resource('brand', BrandController::class)->except('show', 'create');
    Route::resource('kategori', KategoriController::class)->except('show', 'create');
    Route::resource('satuan', SatuanController::class)->except('show', 'create');
});

require __DIR__ . '/auth.php';