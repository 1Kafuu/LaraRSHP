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
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\TemuDokterController;

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
    Route::post('createRole', [RoleController::class, 'createRole'])->name('createRole');
    Route::delete('deleteRole/{id}', [RoleController::class, 'deleteRole'])->name('deleteRole');
    Route::get('getRolebyId/{id}', [RoleController::class, 'getRolebyId'])->name('getRolebyId');
    Route::put('updateRole/{id}', [RoleController::class, 'updateRole'])->name('updateRole');
    Route::post('createPemilik', [PemilikController::class, 'createPemilik'])->name('createPemilik');
    Route::delete('deletePemilik/{id}', [PemilikController::class, 'deletePemilik'])->name('deletePemilik');
    Route::get('getPemilikbyId/{id}', [PemilikController::class, 'getPemilikbyId'])->name('getPemilikbyId');
    Route::put('updatePemilik/{id}', [PemilikController::class, 'updatePemilik'])->name('updatePemilik');
    Route::post('createPet', [PetController::class, 'createPet'])->name('createPet');
    Route::delete('deletePet/{id}', [PetController::class, 'deletePet'])->name('deletePet');
    Route::get('getPetbyId/{id}', [PetController::class, 'getPetbyId'])->name('getPetbyId');
    Route::put('updatePet/{id}', [PetController::class, 'updatePet'])->name('updatePet');
    Route::post('createJenisHewan', [JenisHewanController::class, 'createJenisHewan'])->name('createJenisHewan');
    Route::delete('deleteJenisHewan/{id}', [JenisHewanController::class, 'deleteJenisHewan'])->name('deleteJenisHewan');
    Route::get('getJenisHewanbyId/{id}', [JenisHewanController::class, 'getJenisHewanbyId'])->name('getJenisHewanbyId');
    Route::put('updateJenisHewan/{id}', [JenisHewanController::class, 'updateJenisHewan'])->name('updateJenisHewan');
    Route::post('createKategori', [KategoriController::class, 'createKategori'])->name('createKategori');
    Route::delete('deleteKategori/{id}', [KategoriController::class, 'deleteKategori'])->name('deleteKategori');
    Route::get('getKategoribyId/{id}', [KategoriController::class, 'getKategoribyId'])->name('getKategoribyId');
    Route::put('updateKategori/{id}', [KategoriController::class, 'updateKategori'])->name('updateKategori');
    Route::post('createKategoriKlinis', [KategoriKlinisController::class, 'createKategoriKlinis'])->name('createKategoriKlinis');
    Route::delete('deleteKategoriKlinis/{id}', [KategoriKlinisController::class, 'deleteKategoriKlinis'])->name('deleteKategoriKlinis');
    Route::get('getKategoriKlinisbyId/{id}', [KategoriKlinisController::class, 'getKategoriKlinisbyId'])->name('getKategoriKlinisbyId');
    Route::put('updateKategoriKlinis/{id}', [KategoriKlinisController::class, 'updateKategoriKlinis'])->name('updateKategoriKlinis');
    Route::post('createKode', [KodeTindakanController::class, 'createKode'])->name('createKode');
    Route::delete('deleteKode/{id}', [KodeTindakanController::class, 'deleteKode'])->name('deleteKode');
    Route::get('getKodeTindakanbyId/{id}', [KodeTindakanController::class, 'getKodeTindakanbyId'])->name('getKodeTindakanbyId');
    Route::put('updateKode/{id}', [KodeTindakanController::class, 'updateKode'])->name('updateKode');
    Route::get('getRoleUserbyId/{id}', [RoleUserController::class, 'getRoleUserbyId'])->name('getRoleUserbyId');
    Route::put('updateRoleUser/{id}', [RoleUserController::class, 'updateRoleUser'])->name('updateRoleUser');
    Route::delete('deleteRoleUser/{id}', [RoleUserController::class, 'deleteRoleUser'])->name('deleteRoleUser');
    Route::post('createRas', [RasHewanController::class, 'createRas'])->name('createRas');
    Route::get('getRasbyId/{id}', [RasHewanController::class, 'getRasbyId'])->name('getRasbyId');
    Route::put('updateRas/{id}', [RasHewanController::class, 'updateRas'])->name('updateRas');
    Route::delete('deleteRas/{id}', [RasHewanController::class, 'deleteRas'])->name('deleteRas');
    Route::get('datatemu', [TemuDokterController::class, 'getTemu'])->name('datatemu');
    Route::post('createTemu', [TemuDokterController::class, 'createTemu'])->name('createTemu');
    Route::delete('deleteTemu/{id}', [TemuDokterController::class, 'deleteTemu'])->name('deleteTemu');
    Route::put('updateTemu/{id}', [TemuDokterController::class, 'updateTemu'])->name('updateTemu');
    Route::get('datarekammedis', [RekamMedisController::class, 'getRekam'])->name('datarekam');
});

Route::middleware(['akses:1,4'])->group(function () {
    Route::get('/datapemilik', [PemilikController::class, 'getpemilik'])->name('datapemilik');
    Route::get('/datapet', [PetController::class, 'getPet'])->name('datapet');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
