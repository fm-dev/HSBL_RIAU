<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientSideController;
use App\Http\Controllers\authController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\managedEventsScore;
use App\Http\Controllers\managedJerseyController;
use App\Http\Controllers\managedOfficialController;
use App\Http\Controllers\managedPesertaController;
use App\Http\Controllers\masterDataController;


Route::get('/', [ClientSideController::class, 'index'])->name('index');
Route::get('/login', [ClientSideController::class, 'login'])->name('login');
Route::get('/registrasi', [ClientSideController::class, 'registrasi'])->name('registrasi');
Route::post('/registrasi/add/user', [authController::class, 'registrasiUser'])->name('registrasi.user');
Route::post('/login/user', [authController::class, 'login'])->name('login.user');
Route::get('/profile', [authController::class, 'profile'])->name('login.profile');
Route::get('/myevent', [ClientSideController::class, 'myeventPage'])->name('myevent');
Route::get('/myevent/monitoringAnggota', [ClientSideController::class, 'monitoringPutraView'])->name('myevent.monitoringputra');
Route::get('/myevent/tambahanggota', [ClientSideController::class, 'tambahAnggota'])->name('myevent.tambahAnggota');
Route::get('/portal/admin/login', [authController::class, 'portal_login_admin'])->name('portal.admin.login');
Route::get('/portal/admin/registrasi', [authController::class, 'portal_registrasi_admin'])->name('portal.admin.registrasi');
Route::post('/portal/admin/regis/daftar', [authController::class, 'registrasiAdmin'])->name('portal.admin.registrasi');
Route::post('/portal/admin/login/signin', [authController::class, 'loginAdmin'])->name('portal.admin.postLogin');
Route::get('/portal/admin/index', [adminController::class, 'index'])->name('portal.admin.index')->middleware('admin.role');
Route::get('/portal/admin/profile', [adminController::class, 'detailProfile'])->name('portal.admin.detailprofile')->middleware('admin.role');
Route::get('/portal/admin/dataAdmin', [adminController::class, 'dataAdminView'])->name('portal.admin.dataAdminView')->middleware('admin.role');
Route::get('/portal/admin/useralldata', [adminController::class, 'dataUserView'])->name('portal.admin.dataUserView')->middleware('admin.role');
Route::get('/portal/admin/team/list', [adminController::class, 'dataListTeam'])->name('portal.admin.dataListTeam')->middleware('admin.role');
Route::get('/portal/admin/events/listseasons', [adminController::class, 'dataListSeasons'])->name('portal.admin.dataListSeasons')->middleware('admin.role');
Route::get('/portal/admin/events/listkompetisi', [adminController::class, 'dataListKompetisi'])->name('portal.admin.dataListKompetisi')->middleware('admin.role');
Route::get('/portal/admin/events/listSeries', [adminController::class, 'dataListSeries'])->name('portal.admin.dataListSeries')->middleware('admin.role');
Route::get('/portal/admin/events/listSekolah', [adminController::class, 'dataListSekolah'])->name('portal.admin.dataListSeries')->middleware('admin.role');
Route::get('/portal/admin/events/listScore', [adminController::class, 'dataListScore'])->name('portal.admin.dataListScore')->middleware('admin.role');
Route::get('/portal/admin/logout', [adminController::class, 'logout'])->name('portal.admin.logout')->middleware('admin.role');
Route::get('/logout', [authController::class, 'logout'])->name('logout');
Route::prefix('/events')->name('events')->group(function () {
    Route::get('form', [EventController::class, 'ViewAddSeasons'])->name('form');
    Route::post('/post', [EventController::class, 'CreatedSeasons'])->name('post');
    Route::post('/peserta/store', [managedPesertaController::class, 'storePeserta'])->name('peserta.post');
    Route::get('/peserta/edit/{id}', [managedPesertaController::class, 'editPeserta'])->name('peserta.edit');
    Route::put('/peserta/update/{id}', [managedPesertaController::class, 'updatePeserta'])->name('peserta.update');
    Route::get('/peserta/delete/{id}', [managedPesertaController::class, 'deletePeserta'])->name('peserta.delete');
});
Route::prefix('official')->name('official.')->group(function () {
    Route::post('/store', [ManagedOfficialController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [ManagedOfficialController::class, 'edit'])->name('edit');
    Route::get('/form/{id?}', [ManagedOfficialController::class, 'form'])->name('form');
    Route::post('/update', [ManagedOfficialController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [ManagedOfficialController::class, 'delete'])->name('delete');
});
Route::prefix('jersey')->name('jersey.')->group(function () {
    Route::post('/store', [managedJerseyController::class, 'store'])->name('store');
    Route::get('/edit/{id}', [managedJerseyController::class, 'edit'])->name('edit');
    Route::get('/form/{id?}', [managedJerseyController::class, 'form'])->name('form');
    Route::post('/update', [managedJerseyController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [managedJerseyController::class, 'destroy'])->name('delete');
});
Route::prefix('/admin')->name('admin.')->middleware('admin.role')->group(function () {
    Route::get('manage_admin', [adminController::class, 'viewDataAdmin'])->name('manage_admin');
    Route::get('form_create_admin', [adminController::class, 'formCreateAdmin'])->name('manage_admin.form');
    Route::post('create_admin', [adminController::class, 'createAdmin'])->name('manage_admin.create');
    Route::delete('delete_admin/{id}', [adminController::class, 'destroy'])->name('manage_admin.delete');
    Route::get('edit_admin/{id}', [adminController::class, 'edit'])->name('manage_admin.edit');
    Route::put('update_admin/{id}', [adminController::class, 'update'])->name('manage_admin.update');
    // Role management
    Route::get('manage_roles', [adminController::class, 'rolesIndex'])->name('manage_roles');
    Route::get('roles/{id}/edit', [adminController::class, 'editRole'])->name('manage_roles.edit');
    Route::put('roles/{id}', [adminController::class, 'updateRole'])->name('manage_roles.update');
    Route::delete('roles/{id}', [adminController::class, 'deleteRole'])->name('manage_roles.delete');
    // Menu management
    Route::get('menus', [adminController::class, 'menusIndex'])->name('manage_menus');
    Route::get('menus/parent/create', [adminController::class, 'createMenuParent'])->name('manage_menus.create_parent');
    Route::post('menus/parent', [adminController::class, 'storeMenuParent'])->name('manage_menus.store_parent');
    Route::get('menus/parent/{id}/edit', [adminController::class, 'editMenuParent'])->name('manage_menus.edit_parent');
    Route::put('menus/parent/{id}', [adminController::class, 'updateMenuParent'])->name('manage_menus.update_parent');
    Route::delete('menus/parent/{id}', [adminController::class, 'deleteMenuParent'])->name('manage_menus.delete_parent');
    Route::get('menus/child/create', [adminController::class, 'createMenuChild'])->name('manage_menus.create_child');
    Route::post('menus/child', [adminController::class, 'storeMenuChild'])->name('manage_menus.store_child');
    Route::get('menus/child/{id}/edit', [adminController::class, 'editMenuChild'])->name('manage_menus.edit_child');
    Route::put('menus/child/{id}', [adminController::class, 'updateMenuChild'])->name('manage_menus.update_child');
    Route::delete('menus/child/{id}', [adminController::class, 'deleteMenuChild'])->name('manage_menus.delete_child');
    // Wilayah management
    Route::get('wilayah', [adminController::class, 'wilayahIndex'])->name('manage_wilayah');
    Route::get('wilayah/create', [adminController::class, 'createWilayah'])->name('manage_wilayah.create');
    Route::post('wilayah', [adminController::class, 'storeWilayah'])->name('manage_wilayah.store');
    Route::get('wilayah/{id}/edit', [adminController::class, 'editWilayah'])->name('manage_wilayah.edit');
    Route::put('wilayah/{id}', [adminController::class, 'updateWilayah'])->name('manage_wilayah.update');
    Route::delete('wilayah/{id}', [adminController::class, 'deleteWilayah'])->name('manage_wilayah.delete');
    //session management
    Route::get('session', [masterDataController::class, 'sessionIndex'])->name('manage_session');
    Route::get('session/create', [masterDataController::class, 'FormCreatedSeason'])->name('manage_session.create');
    Route::post('session', [masterDataController::class, 'createdSesions'])->name('manage_session.store');
    Route::get('session/{id}/edit', [masterDataController::class, 'editSession'])->name('manage_session.edit');
    Route::put('session/{id}', [masterDataController::class, 'updateSession'])->name('manage_session.update');
    Route::get('session/delete/{id}', [masterDataController::class, 'deleteSession'])->name('manage_session.delete');
    //session kompetisi
    Route::get('kompetisi', [masterDataController::class, 'kompetisiIndex'])->name('manage_session');
    Route::get('kompetisi/create', [masterDataController::class, 'FormCreatedkompetisi'])->name('manage_session.create');
    Route::post('kompetisi', [masterDataController::class, 'createdkompetisi'])->name('manage_session.store');
    Route::get('kompetisi/delete/{id}', [masterDataController::class, 'delteKompetisi'])->name('manage_session.delete');
    //session managed user
    Route::get('/masterUser/list', [masterDataController::class, 'listMasterUser'])->name('manage_master_user.list');
    Route::get('/masterUser/form', [masterDataController::class, 'viewAddUsers'])->name('manage_master_user.form');
    Route::post('/masterUser/create', [masterDataController::class, 'createdMasterUser'])->name('manage_master_user.create');
    Route::get('/masterUser/delete/{id}', [masterDataController::class, 'deleteMasterUser'])->name('manage_master_user.delete');
    // series management
    Route::get('series', [masterDataController::class, 'seriesIndex'])->name('manage_series');
    Route::get('series/create', [masterDataController::class, 'FormCreatedSeries'])->name('manage_series.create');
    Route::post('series', [masterDataController::class, 'createdSeries'])->name('manage_series.store');
    Route::get('series/delete/{id}', [masterDataController::class, 'deleteSeries'])->name('manage_series.delete');
    //Series Sekolah
    Route::get('sekolah', [masterDataController::class, 'sekolahIndex'])->name('manage_sekolah');
    Route::get('sekolah/form', [masterDataController::class, 'formSekolah'])->name('manage_sekolah.create');
    Route::post('sekolah/create', [masterDataController::class, 'storesekolah'])->name('manage_sekolah.create');
    Route::get('sekolah/delete/{id}', [masterDataController::class, 'deleteSekolah'])->name('manage_sekolah.delete');
    Route::get('sekolah/edit/{id}', [masterDataController::class, 'editSekolah'])->name('manage_sekolah.edit');
    Route::post('sekolah/update/{id}', [masterDataController::class, 'updateSekolah'])->name('manage_sekolah.update');
    //kompetisi management
    Route::get('kompetisi/team_list', [masterDataController::class, 'teamList'])->name('manage_kompetisi');
    Route::get('kompetisi/form', [masterDataController::class, 'formKompetisi'])->name('manage_kompetisi.create');
    Route::post('kompetisi/create', [masterDataController::class, 'storeKompetisiEvents'])->name('manage_kompetisi.create');
    Route::get('kompetisi/team_list/delete/{id}', [masterDataController::class, 'deleteKompetisiEvents'])->name('manage_kompetisi.delete');
    Route::get('kompetisi/team_list/edit/{id}', [masterDataController::class, 'editKompetisiEvents'])->name('manage_kompetisi.edit');
    Route::post('kompetisi/team_list/update/{id}', [masterDataController::class, 'updateKompetisiEvents'])->name('manage_kompetisi.update');
    //kompetisi managemenet team verification
    Route::get('/kompetisi/team_verification', [masterDataController::class, 'teamVerificationList'])->name('manage_kompetisi.verify.list');
    Route::get('/kompetisi/team_verification/detail/{id}', [masterDataController::class, 'teamVerificationDetail'])->name('manage_kompetisi.verify.detail');
    //kompetisi management blacklist team
    Route::get('/kompetisi/black_list', [masterDataController::class, 'teamBlacklistList'])->name('manage_kompetisi.blacklist.list');
    Route::get('/kompetisi/team_blacklist/form', [masterDataController::class, 'teamBlacklistForm'])->name('manage_kompetisi.blacklist.form');
    Route::post('/kompetisi/team_blacklist/store', [masterDataController::class, 'teamBlacklistStore'])->name('manage_kompetisi.blacklist.store');
    Route::get('/kompetisi/team_blacklist/delete/{id}', [masterDataController::class, 'teamBlacklistDelete'])->name('manage_kompetisi.blacklist.delete');
    //management positions
    Route::get('/positions/list', [masterDataController::class, 'listPositions'])->name('manage_position.list');
    Route::post('/positions/create', [masterDataController::class, 'createPositions'])->name('manage_position.create');
    Route::get('/positions/delete', [masterDataController::class, 'deletePositions'])->name('manage_position.delete');
    Route::get('/positions/form', [masterDataController::class, 'formPositions'])->name('manage_position.form');
    Route::get('/eventsScore', [managedEventsScore::class, 'dashboard'])->name('eventsScore.dashboard');
    
    Route::get('/eventsScore', [managedEventsScore::class, 'dashboard'])->name('eventsScore.dashboard');
    Route::get('/eventsScore/form', [managedEventsScore::class, 'form'])->name('eventsScore.form');
    Route::post('/eventsScore/create', [managedEventsScore::class, 'store'])->name('eventsScore.store');
});
