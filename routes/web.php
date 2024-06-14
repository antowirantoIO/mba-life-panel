<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/management/banner/json', [BannerController::class, 'getJsonBanner'])->name('management.banner.json');

Route::get('/management/banner', [BannerController::class, 'index'])->middleware(['auth', 'verified'])->name('management.banner');
Route::get('/management/banner/edit/{banner:id}', [BannerController::class, 'edit'])->middleware(['auth', 'verified'])->name('management.banner.edit');
Route::post('/management/banner/update/{banner:id}', [BannerController::class, 'update'])->middleware(['auth', 'verified'])->name('management.banner.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
