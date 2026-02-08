<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientSideController;
use App\Http\Controllers\authController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\EventController;
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
Route::get('/portal/admin/index', [adminController::class,'index'])->name('portal.admin.index')->middleware('admin.role');
Route::get('/portal/admin/profile',[adminController::class,'detailProfile'])->name('portal.admin.detailprofile')->middleware('admin.role');
Route::get('/portal/admin/dataAdmin',[adminController::class,'dataAdminView'])->name('portal.admin.dataAdminView')->middleware('admin.role');
Route::get('/portal/admin/useralldata',[adminController::class,'dataUserView'])->name('portal.admin.dataUserView')->middleware('admin.role');
Route::get('/portal/admin/team/list',[adminController::class,'dataListTeam'])->name('portal.admin.dataListTeam')->middleware('admin.role');
Route::get('/portal/admin/events/listseasons',[adminController::class,'dataListSeasons'])->name('portal.admin.dataListSeasons')->middleware('admin.role');
Route::get('/portal/admin/events/listkompetisi',[adminController::class,'dataListKompetisi'])->name('portal.admin.dataListKompetisi')->middleware('admin.role');
Route::get('/portal/admin/events/listSeries',[adminController::class,'dataListSeries'])->name('portal.admin.dataListSeries')->middleware('admin.role');
Route::get('/portal/admin/events/listSekolah',[adminController::class,'dataListSekolah'])->name('portal.admin.dataListSeries')->middleware('admin.role');
Route::get('/portal/admin/events/listScore',[adminController::class,'dataListScore'])->name('portal.admin.dataListScore')->middleware('admin.role');
Route::get('/portal/admin/logout',[adminController::class,'logout'])->name('portal.admin.logout')->middleware('admin.role');

Route::prefix('/events')->name('events')->group(function () {
    Route::get('form',[EventController::class, 'ViewAddSeasons'])->name('form');
    Route::post('/post',[EventController::class, 'CreatedSeasons'])->name('post');
});
Route::prefix('/admin')->name('admin.')->middleware('admin.role')->group(function(){
    Route::get('manage_admin',[adminController::class, 'viewDataAdmin'])->name('manage_admin');
    Route::get('form_create_admin',[adminController::class, 'formCreateAdmin'])->name('manage_admin.form');
    Route::post('create_admin',[adminController::class, 'createAdmin'])->name('manage_admin.create');
    Route::delete('delete_admin/{id}', [adminController::class, 'destroy'])->name('manage_admin.delete');
    Route::get('edit_admin/{id}', [adminController::class, 'edit'])->name('manage_admin.edit');
    Route::put('update_admin/{id}', [adminController::class, 'update'])->name('manage_admin.update');
    // Role management
    Route::get('manage_roles',[adminController::class, 'rolesIndex'])->name('manage_roles');
    Route::get('roles/{id}/edit',[adminController::class, 'editRole'])->name('manage_roles.edit');
    Route::put('roles/{id}',[adminController::class, 'updateRole'])->name('manage_roles.update');
    Route::delete('roles/{id}',[adminController::class, 'deleteRole'])->name('manage_roles.delete');
    // Menu management
    Route::get('menus',[adminController::class, 'menusIndex'])->name('manage_menus');
    Route::get('menus/parent/create',[adminController::class, 'createMenuParent'])->name('manage_menus.create_parent');
    Route::post('menus/parent',[adminController::class, 'storeMenuParent'])->name('manage_menus.store_parent');
    Route::get('menus/parent/{id}/edit',[adminController::class, 'editMenuParent'])->name('manage_menus.edit_parent');
    Route::put('menus/parent/{id}',[adminController::class, 'updateMenuParent'])->name('manage_menus.update_parent');
    Route::delete('menus/parent/{id}',[adminController::class, 'deleteMenuParent'])->name('manage_menus.delete_parent');
    Route::get('menus/child/create',[adminController::class, 'createMenuChild'])->name('manage_menus.create_child');
    Route::post('menus/child',[adminController::class, 'storeMenuChild'])->name('manage_menus.store_child');
    Route::get('menus/child/{id}/edit',[adminController::class, 'editMenuChild'])->name('manage_menus.edit_child');
    Route::put('menus/child/{id}',[adminController::class, 'updateMenuChild'])->name('manage_menus.update_child');
    Route::delete('menus/child/{id}',[adminController::class, 'deleteMenuChild'])->name('manage_menus.delete_child');
    // Wilayah management
    Route::get('wilayah',[adminController::class, 'wilayahIndex'])->name('manage_wilayah');
    Route::get('wilayah/create',[adminController::class, 'createWilayah'])->name('manage_wilayah.create');
    Route::post('wilayah',[adminController::class, 'storeWilayah'])->name('manage_wilayah.store');
    Route::get('wilayah/{id}/edit',[adminController::class, 'editWilayah'])->name('manage_wilayah.edit');
    Route::put('wilayah/{id}',[adminController::class, 'updateWilayah'])->name('manage_wilayah.update');
    Route::delete('wilayah/{id}',[adminController::class, 'deleteWilayah'])->name('manage_wilayah.delete');
});

