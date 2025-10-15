<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientSideController;

Route::get('/', [ClientSideController::class,'index'])->name('index');
Route::get('/login', [ClientSideController::class,'login'])->name('login');
Route::get('/registrasi', [ClientSideController::class,'registrasi'])->name('registrasi');
