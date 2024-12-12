<?php

use App\Http\Controllers\InformasiController;
use App\Http\Controllers\MahasiswaBaruController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/informasiadmin', [InformasiController::class, 'index'])->name('adminui.kelolainformasi');
    Route::get('/informasiedit/{id}', [InformasiController::class, 'edit'])->name('adminui.editinformasi');
    Route::get('/informasicreate', [InformasiController::class, 'create'])->name('adminui.buatinformasi');
    Route::post('/informasicreate/post', [InformasiController::class, 'store'])->name('adminui.postinformasi');
    Route::delete('/informasidelete', [InformasiController::class, 'delete'])->name('adminui.deleteinformasi');
    Route::get('/dashboardadmin', [UserController::class, 'indexAdmin'])->name('adminui.dashboard');
    Route::post('/validasi', [UserController::class, 'validateAkun'])->name('adminui.validate');
    Route::get('/dashboardmhs', [UserController::class, 'indexUser'])->name('userui.dashboard');
    Route::get('/daftarmhs', [MahasiswaBaruController::class, 'create'])->name('userui.create');
    Route::post('/daftarmhs/post', [MahasiswaBaruController::class, 'store'])->name('userui.post');
});

Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('dashboard');
});

require __DIR__.'/auth.php';
