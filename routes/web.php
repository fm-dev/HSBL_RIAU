<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientSideController;
use App\Http\Controllers\authController;
use App\Http\Controllers\adminController;
Route::get('/', [ClientSideController::class,'index'])->name('index');
Route::get('/login', [ClientSideController::class,'login'])->name('login');
Route::get('/registrasi', [ClientSideController::class,'registrasi'])->name('registrasi');
Route::post('/registrasi/add/user', [authController::class,'registrasiUser'])->name('registrasi.user');
Route::post('/login/user', [authController::class,'login'])->name('login.user');
Route::get('/myevent', [ClientSideController::class,'myeventPage'])->name('myevent');
Route::get('/myevent/monitoringAnggota', [ClientSideController::class,'monitoringPutraView'])->name('myevent.monitoringputra');
Route::get('/myevent/tambahanggota', [ClientSideController::class,'tambahAnggota'])->name('myevent.tambahAnggota');
Route::get('/portal/admin/login', [authController::class,'portal_login_admin'])->name('portal.admin.login');
Route::get('/portal/admin/registrasi', [authController::class,'portal_registrasi_admin'])->name('portal.admin.registrasi');
Route::post('/portal/admin/regis/daftar', [authController::class,'registrasiAdmin'])->name('portal.admin.registrasi');
Route::post('/portal/admin/login/signin', [authController::class,'loginAdmin'])->name('portal.admin.postLogin');
Route::get('/portal/admin/index', [adminController::class,'index'])->name('portal.admin.index');
Route::get('/portal/admin/profile',[adminController::class,'detailProfile'])->name('portal.admin.detailprofile');
Route::get('/portal/admin/dataAdmin',[adminController::class,'dataAdminView'])->name('portal.admin.dataAdminView');

