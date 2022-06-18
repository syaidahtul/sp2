<?php

use App\Http\Controllers\OperasiController;
use App\Http\Controllers\PbtProfail\LokasiController;
use App\Http\Controllers\PbtProfail\PbtProfailController;
use App\Http\Controllers\PbtProfail\TapakPelupusanSampahController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Setup\PbtController;
use App\Http\Controllers\Setup\DaerahController;
use App\Http\Controllers\Setup\JenisKawasansController;
use App\Http\Controllers\Setup\JenisJenterasController;
use App\Http\Controllers\Setup\JenisOperasisController;
use App\Http\Controllers\UserManagement\UserController;
use App\Http\Livewire\Dashboards\ExecutiveDashboard;

Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/', ExecutiveDashboard::class)->name('dashboard');

    Route::group(['prefix' => 'setup', 'as' => 'setup.'], function () {
        Route::get('/pbt', [PbtController::class, 'index'])->name('pbt.index');
        Route::get('/pbt/baru', [PbtController::class, 'create'])->name('pbt.create');
        Route::post('/pbt/simpan', [PbtController::class, 'store'])->name('pbt.store');
        Route::get('/pbt/papar/{pbt}', [PbtController::class, 'view'])->name('pbt.view');
        Route::get('/pbt/edit/{pbt}', [PbtController::class, 'edit'])->name('pbt.edit');
        Route::put('/pbt/kemaskini/{pbt}', [PbtController::class, 'update'])->name('pbt.update');
        Route::delete('/pbt/padam/{pbt}', [PbtController::class, 'destroy'])->name('pbt.destroy');

        Route::get('/daerah', [DaerahController::class, 'index'])->name('daerah.index');
        Route::get('/daerah/baru', [DaerahController::class, 'create'])->name('daerah.create');

        Route::get('/jenis_operasis', [JenisOperasisController::class, 'index'])->name('jenis_operasis.index');
        Route::get('/jenis_operasis/baru', [JenisOperasisController::class, 'create'])->name('jenis_operasis.create');
        Route::post('/jenis_operasis/simpan', [JenisOperasisController::class, 'store'])->name('jenis_operasis.store');
        Route::get('/jenis_operasis/papar/{jenis_operasis}', [JenisOperasisController::class, 'view'])->name('jenis_operasis.view');

        Route::get('/jenis_kawasan', [JenisKawasansController::class, 'index'])->name('jenis_kawasan.index');
        Route::get('/jenis_kawasan/baru', [JenisKawasansController::class, 'create'])->name('jenis_kawasan.create');
        Route::post('/jenis_kawasan/simpan', [JenisKawasansController::class, 'store'])->name('jenis_kawasan.store');

        Route::get('/jenis_jentera', [JenisJenterasController::class, 'index'])->name('jenis_jentera.index');
        Route::get('/jenis_jentera/baru', [JenisJenterasController::class, 'create'])->name('jenis_jentera.create');
        Route::post('/jenis_jentera/simpan', [JenisJenterasController::class, 'store'])->name('jenis_jentera.store');
    });

    Route::group(['prefix' => 'usermgmt', 'as' => 'usermgmt.'], function () {

        Route::get('/pengguna', [UserController::class, 'index'])->name('user.index');
        Route::get('/pengguna/baru', [UserController::class, 'create'])->name('user.create');
        Route::post('/pengguna/simpan', [UserController::class, 'store'])->name('user.store');
        Route::get('/pengguna/papar/{user}', [UserController::class, 'view'])->name('user.view');
        Route::get('/pengguna/edit/{user}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/pengguna/kemaskini/{user}', [UserController::class, 'update'])->name('user.update');
        Route::delete('/pengguna/padam/{user}', [UserController::class, 'destroy'])->name('user.destroy');

    });

    Route::group(['prefix' => 'profailpbt', 'as' => 'profailpbt.'], function () {

        Route::get('/', [PbtProfailController::class, 'index'])->name('index');

        Route::get('/lokasi', [LokasiController::class, 'index'])->name('lokasi.index');
        Route::get('/lokasi/baru', [LokasiController::class, 'create'])->name('lokasi.create');
        Route::post('/lokasi/simpan', [LokasiController::class, 'store'])->name('lokasi.store');
        Route::get('/lokasi/papar/{lokasi}', [LokasiController::class, 'view'])->name('lokasi.view');
        Route::get('/lokasi/edit/{lokasi}', [LokasiController::class, 'edit'])->name('lokasi.edit');
        Route::put('/lokasi/kemaskini/{lokasi}', [LokasiController::class, 'update'])->name('lokasi.update');
        Route::delete('/lokasi/padam/{lokasi}', [LokasiController::class, 'destroy'])->name('lokasi.destroy');

        Route::get('/tapakpelupusan', [TapakPelupusanSampahController::class, 'index'])->name('tapakpelupusansampah.index');
        Route::get('/tapakpelupusan/baru', [TapakPelupusanSampahController::class, 'create'])->name('tapakpelupusansampah.create');
        Route::post('/tapakpelupusan/simpan', [TapakPelupusanSampahController::class, 'store'])->name('tapakpelupusansampah.store');
        Route::get('/tapakpelupusan/papar/{lokasi}', [TapakPelupusanSampahController::class, 'view'])->name('tapakpelupusansampah.view');
        Route::get('/tapakpelupusan/edit/{lokasi}', [TapakPelupusanSampahController::class, 'edit'])->name('tapakpelupusansampah.edit');
        Route::put('/tapakpelupusan/kemaskini/{lokasi}', [TapakPelupusanSampahController::class, 'update'])->name('tapakpelupusansampah.update');
        Route::delete('/tapakpelupusan/padam/{lokasi}', [TapakPelupusanSampahController::class, 'destroy'])->name('tapakpelupusansampah.destroy');

    });

    Route::group(['prefix' => 'operasi', 'as' => 'operasi.'], function () {

        Route::get('/', [OperasiController::class, 'index'])->name('index');

    });

});
