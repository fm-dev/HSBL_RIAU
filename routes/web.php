<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientSideController;
use App\Http\Controllers\authController;

Route::get('/', [ClientSideController::class,'index'])->name('index');
Route::get('/login', [ClientSideController::class,'login'])->name('login');
Route::get('/registrasi', [ClientSideController::class,'registrasi'])->name('registrasi');
Route::post('/registrasi/add/user', [authController::class,'registrasiUser'])->name('registrasi.user');
Route::post('/login/user', [authController::class,'login'])->name('login.user');
