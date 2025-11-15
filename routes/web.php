<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\RasHewanController;
use App\Http\Controllers\RoleUserController;
use App\Http\Controllers\JenisHewanController;
use App\Http\Controllers\KodeTindakanController;
use App\Http\Controllers\KategoriKlinisController;

Route::get('/', [SiteController::class, 'index'])->name('index');

Route::get('dashboard', [SiteController::class, 'dashboard'])->name('dashboard');


Route::get('/organisasi', [SiteController::class, 'organisasi'])->name('organisasi');

Route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');

Route::get('/login', [SiteController::class, 'login'])->name('login');

Route::get('/visi', [SiteController::class, 'visi'])->name('visi');

Route::middleware(['akses:1'])->group(function () {
    Route::get('/datauser', [UserController::class, 'getUser'])->name('datauser');
    Route::get('/datarole', [RoleController::class, 'getRole'])->name('datarole');
    Route::get('/dataroleuser', [RoleUserController::class, 'viewRoleUser'])->name('dataroleuser');
    Route::get('/datajenishewan', [JenisHewanController::class, 'getJenisHewan'])->name('datajenishewan');
    Route::get('/datakategori', [KategoriController::class, 'getKategori'])->name('datakategori');
    Route::get('/datakategoriklinis', [KategoriKlinisController::class, 'getKategoriKlinis'])->name('datakategoriklinis');
    Route::get('/datakodetindakan', [KodeTindakanController::class, 'getKodeTindakan'])->name('datakodetindakan');
    Route::get('/datarashewan', [RasHewanController::class, 'groupRas'])->name('datarashewan');
    Route::post('createUser', [UserController::class, 'createUser'])->name('createUser');
    Route::get('getUserbyId/{id}', [UserController::class, 'getUserbyId'])->name('getUserbyId');
    Route::delete('deleteUser/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
    Route::put('updateUser/{id}', [UserController::class, 'updateUser'])->name('updateUser');
});

Route::middleware(['akses:1,4'])->group(function () {
    Route::get('/datapemilik', [PemilikController::class, 'getpemilik'])->name('datapemilik');
    Route::get('/datapet', [PetController::class, 'getPet'])->name('datapet');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
