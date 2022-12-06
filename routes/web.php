<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\KostController;
use App\Http\Controllers\Auth\LoginController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|()
*/
Route::get('/',[LoginController::class,'showLoginForm'])->name('login');

Route::prefix('mahasiswa')->group(function(){
    Route::get('add', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
    Route::post('store', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('/', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('edit/{id}', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
    Route::post('update/{id}', [MahasiswaController::class,'update'])->name('mahasiswa.update');
    Route::post('delete/{id}', [MahasiswaController::class,'delete'])->name('mahasiswa.delete');
});


Route::prefix('pemilik')->group(function(){
    Route::get('add', [PemilikController::class, 'create'])->name('pemilik.create');
    Route::post('store', [PemilikController::class, 'store'])->name('pemilik.store');
    Route::get('/', [PemilikController::class, 'index'])->name('pemilik.index');
    Route::get('edit/{id}', [PemilikController::class, 'edit'])->name('pemilik.edit');
    Route::post('update/{id}', [PemilikController::class,'update'])->name('pemilik.update');
    Route::post('delete/{id}', [PemilikController::class,'delete'])->name('pemilik.delete');
});

Route::prefix('kost')->group(function(){
    Route::get('add', [KostController::class, 'create'])->name('kost.create');
    Route::post('store', [KostController::class, 'store'])->name('kost.store');
    Route::get('/', [KostController::class, 'index'])->name('kost.index');
    Route::get('edit/{id}', [KostController::class, 'edit'])->name('kost.edit');
    Route::post('update/{id}', [KostController::class,'update'])->name('kost.update');
    Route::post('delete/{id}', [KostController::class,'delete'])->name('kost.delete');
    Route::post('soft/{id}', [KostController::class, 'soft'])->name('kost.soft');
    Route::post('restore/{id}', [KostController::class, 'restore'])->name('kost.restore');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
