<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeksiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AktivitasController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\DepartemenController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('proseslogin', [LoginController::class,'proseslogin'])->name('proseslogin');

Route::middleware(['auth'])->group(function () {
    
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
//Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/tambah', [KategoriController::class, 'create'])->name('kategori.create')->middleware('can:isSit');
Route::post('/kategori/store', [KategoriController::class, 'store'])->name('kategori.store')->middleware('can:isSit');
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit')->middleware('can:isSit');
Route::put('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update')->middleware('can:isSit');
Route::delete('/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('kategori.delete')->middleware('can:isSit');

// Edit Password
Route::get('/editPassword', [PasswordController::class, 'index'])->name('password');
Route::patch('/editPassword', [PasswordController::class, 'update'])->name('passwordUpdate');

// Pengajuan
Route::get('pengajuan', [PengajuanController::class, 'index'])->name('pengajuan.index');
Route::get('/pengajuan/tambah', [PengajuanController::class, 'create'])->name('pengajuan.create');
Route::post('/pengajuan/store', [PengajuanController::class, 'store'])->name('pengajuan.store');
Route::get('/pengajuan/detail/{id}', [PengajuanController::class, 'show'])->name('pengajuan.detail');
Route::get('/pengajuan/edit/{id}', [PengajuanController::class, 'edit'])->name('pengajuan.edit');
Route::put('/pengajuan/update/{id}', [PengajuanController::class, 'update'])->name('pengajuan.update');
Route::delete('/pengajuan/delete/{id}', [PengajuanController::class, 'delete'])->name('pengajuan.delete');
Route::get('/pengajuan-disetujui', [PengajuanController::class, 'pengajuan_diterima'])->name('pengajuan.diterima');
Route::get('/pengajuan-ditolak', [PengajuanController::class, 'pengajuan_ditolak'])->name('pengajuan.ditolak')->middleware('can:isUser');
Route::get('/pengajuan-selesai', [PengajuanController::class, 'pengajuan_selesai'])->name('pengajuan.selesai');
Route::get('/pengajuan-proses', [PengajuanController::class, 'pengajuan_proses'])->name('pengajuan.proses');

// Approve
Route::get('aprove/{id}', [PengajuanController::class, 'approve'])->name('pengajuan.approve');
Route::get('proses/{id}', [PengajuanController::class, 'proses'])->name('pengajuan.diproses');
Route::get('cancel/{id}', [PengajuanController::class, 'cancel'])->name('pengajuan.cancel');
Route::get('done/{id}', [PengajuanController::class, 'done'])->name('pengajuan.done');

// Logout
Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show');
});


Route::middleware(['auth', 'can:isSit'])->group(function () {
    //Seksi
    Route::get('/seksi', [SeksiController::class, 'index'])->name('seksi.index');
    Route::get('/seksi/tambah', [SeksiController::class, 'create'])->name('seksi.create');
    Route::post('/seksi/store', [SeksiController::class, 'store'])->name('seksi.store');
    Route::get('/seksi/edit/{id}', [SeksiController::class, 'edit'])->name('seksi.edit');
    Route::put('/seksi/update/{id}', [SeksiController::class, 'update'])->name('seksi.update');
    Route::delete('/seksi/delete/{id}', [SeksiController::class, 'delete'])->name('seksi.delete');

    //Departemen
    Route::get('/departemen', [DepartemenController::class, 'index'])->name('departemen.index');
    Route::get('/departemen/tambah', [DepartemenController::class, 'create'])->name('departemen.create');
    Route::post('/departemen/store', [DepartemenController::class, 'store'])->name('departemen.store');
    Route::get('/departemen/edit/{id}', [DepartemenController::class, 'edit'])->name('departemen.edit');
    Route::put('/departemen/update/{id}', [DepartemenController::class, 'update'])->name('departemen.update');
    Route::delete('/departemen/delete/{id}', [DepartemenController::class, 'delete'])->name('departemen.delete');

    //User
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/tambah', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
});