<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratmasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\DisposisiController;
use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('layouts/dashboard');
});
Route::get('/login', function () {
    return view('login');
});
Route::get('/dashboard', function () {
    return view('layouts/dashboard'); 
});
Route::get('/agenda', function () {
    return view('layouts/agenda'); 
});

Route::prefix('suratmasuk')->group(function () {
    Route::get('/', [SuratmasukController::class, 'index'])->name('suratmasuk.index');
    Route::get('/detail', [SuratmasukController::class, 'detail'])->name('suratmasuk.detail');
    Route::get('/create', [SuratmasukController::class, 'create'])->name('suratmasuk.create');
    Route::post('/store', [SuratmasukController::class, 'store'])->name('suratmasuk.store');
    Route::get('/{id}', [SuratmasukController::class, 'show'])->name('suratmasuk.show');
    Route::get('/{id}/edit',[SuratmasukController::class, 'edit'])->name('suratmasuk.edit');
    Route::put('/{id}', [SuratmasukController::class, 'update'])->name('suratmasuk.update');
    Route::delete('/{id}',[SuratmasukController::class, 'destroy'])->name('suratmasuk.destroy');
    Route::get('/galery/{id}',[SuratmasukController::class, 'galery'])->name('suratmasuk.galery');
    Route::get('/suratmasuk/{id}/export-pdf', [SuratmasukController::class, 'show'])->name('suratmasuk.export-pdf');
    ;
    Route::get('/search', [SuratMasukController::class, 'search'])->name('suratmasuk.search');
});
Route::group(['prefix' => 'suratkeluar'], function () {
    Route::get('/', [SuratKeluarController::class, 'index'])->name('suratkeluar.index');
    Route::get('/create', [SuratKeluarController::class, 'create'])->name('suratkeluar.create');
    Route::post('/', [SuratKeluarController::class, 'store'])->name('suratkeluar.store');
    Route::get('/{id}', [SuratKeluarController::class, 'show'])->name('suratkeluar.show');
    Route::get('/{id}/edit', [SuratKeluarController::class, 'edit'])->name('suratkeluar.edit');
    Route::put('/{id}', [SuratKeluarController::class, 'update'])->name('suratkeluar.update');
    Route::delete('/{id}', [SuratKeluarController::class, 'destroy'])->name('suratkeluar.destroy');
});
Route::prefix('disposisi')->group(function () {
    Route::get('/', [DisposisiController::class, 'index'])->name('disposisi.index');
    Route::get('/create/{surat_id}', [DisposisiController::class, 'create'])->name('disposisi.create');
    Route::post('/store', [DisposisiController::class, 'store'])->name('disposisi.store');
    Route::get('/edit/{id}', [DisposisiController::class, 'edit'])->name('disposisi.edit');
    Route::put('/update/{id}', [DisposisiController::class, 'update'])->name('disposisi.update');
    Route::delete('/delete/{id}', [DisposisiController::class, 'destroy'])->name('disposisi.destroy');
});