<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Admin\SuplierController;
use App\Http\Controllers\GeraiController;
use App\Http\Controllers\GudangController;

Route::get('/', function () {
    return view('beranda');
});

Route::get('/gudang', [GudangController::class, 'index'])->name('gudang.index');
Route::get('/gerai', [GeraiController::class, 'index'])->name('gerai.index');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route('admin.barang.index');
    })->name('dashboard');
   
    Route::resource('barang', BarangController::class);
    Route::resource('suplier', SuplierController::class);
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
