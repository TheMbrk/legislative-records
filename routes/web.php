<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrdinanceController;
use App\Http\Controllers\PublicSearchController;
use App\Http\Controllers\ResolutionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PublicSearchController::class, 'index'])->name('search');
Route::get('/ordinances/{ordinance}', [PublicSearchController::class, 'showOrdinance'])->name('public.ordinances.show');
Route::get('/resolutions/{resolution}', [PublicSearchController::class, 'showResolution'])->name('public.resolutions.show');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', '/admin/ordinances');
    Route::resource('ordinances', OrdinanceController::class);
    Route::resource('resolutions', ResolutionController::class);
});
