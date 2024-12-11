<?php

use App\Http\Controllers\InformasiController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboardadmin', function () {
    return view('adminui.dashboard');
})->middleware(['auth', 'verified'])->name('adminui.dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/informasiadmin', [InformasiController::class, 'index'])->name('adminui.kelolainformasi');
});

Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('dashboard');
});

require __DIR__.'/auth.php';
