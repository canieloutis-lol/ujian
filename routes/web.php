<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkutansiController;
use App\Http\Controllers\KeuanganController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/akutansis', [AkutansiController::class, 'index'])->name('akutansi.index');
Route::get('/akutansis/create', [AkutansiController::class, 'create'])->name('akutansi.create');
Route::post('/akutansis', [AkutansiController::class, 'store'])->name('akutansi.store');
Route::get('/akutansis/{id}', [AkutansiController::class, 'show'])->name('akutansi.show');
Route::get('/akutansis/{id}/edit', [AkutansiController::class, 'edit'])->name('akutansi.edit');
Route::put('/akutansis/{id}', [AkutansiController::class, 'update'])->name('akutansi.update');
Route::delete('/akutansis/{id}', [AkutansiController::class, 'destroy'])->name('akutansi.destroy');

Route::resource('keuangants', KeuanganController::class);
Route::get('/keuangants', [KeuanganController::class, 'index'])->name('keuangan.keuangan');
Route::get('/keuangants/create', [KeuanganController::class, 'create'])->name('keuangan.create');
Route::post('/keuangants', [KeuanganController::class, 'store'])->name('keuangan.store');
Route::get('/keuangants/{id}', [KeuanganController::class, 'show'])->name('keuangan.show');
Route::get('/keuangants/{id}/edit', [KeuanganController::class, 'edit'])->name('keuangan.edit');
Route::put('/keuangants/{id}', [KeuanganController::class, 'update'])->name('keuangan.update');
Route::delete('/keuangants/{id}', [KeuanganController::class, 'destroy'])->name('keuangan.destroy');
