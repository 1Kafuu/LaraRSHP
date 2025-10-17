<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [SiteController::class, 'index'])->name('home');

Route::get('/organisasi', [SiteController::class, 'organisasi'])->name('organisasi');

Route::get('/layanan', [SiteController::class, 'layanan'])->name('layanan');

Route::get('/login', [SiteController::class, 'login'])->name('login');

Route::get('/visi', [SiteController::class, 'visi'])->name('visi');