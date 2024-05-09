<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratmasukController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\DisposisiController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
    
Route::get('generate-pdf/{surat_id}', [PDFController::class, 'generatePDF'])->name('pdf');

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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

require __DIR__.'/auth.php';
