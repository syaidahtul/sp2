<?php

use App\Http\Controllers\KosPengurusanSampahController;
use App\Http\Controllers\OperasiController;
use App\Http\Controllers\PbtProfail\LokasiController;
use App\Http\Controllers\PbtProfail\PbtProfailController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Setup\PbtController;
use App\Http\Controllers\Setup\DaerahController;
use App\Http\Controllers\Setup\JenisKawasansController;
use App\Http\Controllers\Setup\JenisJenterasController;
use App\Http\Controllers\Setup\JenisOperasisController;
use App\Http\Controllers\Setup\KontraktorController;
use App\Http\Controllers\Setup\TapakPelupusanSampahController;
use App\Http\Controllers\UserManagement\UserController;
use App\Http\Livewire\Dashboards\ExecutiveDashboard;



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/tukarKataLaluan', [UserController::class, 'forceChangePassword'])->name('user.forceChangePassword');
    Route::post('/kemaskiniKataLaluan', [UserController::class, 'updateforceChangePassword'])->name('user.updateforceChangePassword');
});

Route::middleware(['auth', 'checkPassword',  'verified'])->group(function () {

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
        Route::post('/daerah/simpan', [DaerahController::class, 'store'])->name('daerah.store');
        Route::get('/daerah/edit/{daerah}', [DaerahController::class, 'edit'])->name('daerah.edit');
        Route::put('/daerah/kemaskini/{daerah}', [DaerahController::class, 'update'])->name('daerah.update');

        Route::get('/tapak_pelupusan_sampah', [TapakPelupusanSampahController::class, 'index'])->name('tapak_pelupusan_sampah.index');
        Route::get('/tapak_pelupusan_sampah/baru', [TapakPelupusanSampahController::class, 'create'])->name('tapak_pelupusan_sampah.create');
        Route::post('/tapak_pelupusan_sampah/simpan', [TapakPelupusanSampahController::class, 'store'])->name('tapak_pelupusan_sampah.store');
        Route::get('/tapak_pelupusan_sampah/edit/{tapak}', [TapakPelupusanSampahController::class, 'edit'])->name('tapak_pelupusan_sampah.edit');
        Route::put('/tapak_pelupusan_sampah/kemaskini/{tapak}', [TapakPelupusanSampahController::class, 'update'])->name('tapak_pelupusan_sampah.update');

        Route::get('/jenis_operasis', [JenisOperasisController::class, 'index'])->name('jenis_operasis.index');
        Route::get('/jenis_operasis/baru', [JenisOperasisController::class, 'create'])->name('jenis_operasis.create');
        Route::post('/jenis_operasis/simpan', [JenisOperasisController::class, 'store'])->name('jenis_operasis.store');
        Route::get('/jenis_operasis/papar/{jenis_operasis}', [JenisOperasisController::class, 'view'])->name('jenis_operasis.view');
        Route::get('/jenis_operasis/edit/{jenis_operasis}', [JenisOperasisController::class, 'edit'])->name('jenis_operasis.edit');
        Route::put('/jenis_operasis/kemaskini/{jenis_operasis}', [JenisOperasisController::class, 'update'])->name('jenis_operasis.update');

        Route::get('/jenis_kawasan', [JenisKawasansController::class, 'index'])->name('jenis_kawasan.index');
        Route::get('/jenis_kawasan/baru', [JenisKawasansController::class, 'create'])->name('jenis_kawasan.create');
        Route::post('/jenis_kawasan/simpan', [JenisKawasansController::class, 'store'])->name('jenis_kawasan.store');
        Route::get('/jenis_kawasan/edit/{jenis_kawasan}', [JenisKawasansController::class, 'edit'])->name('jenis_kawasan.edit');
        Route::put('/jenis_kawasan/kemaskini/{jenis_kawasan}', [JenisKawasansController::class, 'update'])->name('jenis_kawasan.update');

        Route::get('/jenis_jentera', [JenisJenterasController::class, 'index'])->name('jenis_jentera.index');
        Route::get('/jenis_jentera/baru', [JenisJenterasController::class, 'create'])->name('jenis_jentera.create');
        Route::post('/jenis_jentera/simpan', [JenisJenterasController::class, 'store'])->name('jenis_jentera.store');
        Route::get('/jenis_jentera/edit/{jenis_jentera}', [JenisJenterasController::class, 'edit'])->name('jenis_jentera.edit');
        Route::put('/jenis_jentera/kemaskini/{jenis_jentera}', [JenisJenterasController::class, 'update'])->name('jenis_jentera.update');

        Route::get('/kontraktor', [KontraktorController::class, 'index'])->name('kontraktor.index');
        Route::get('/kontraktor/baru', [KontraktorController::class, 'create'])->name('kontraktor.create');
        Route::post('/kontraktor/simpan', [KontraktorController::class, 'store'])->name('kontraktor.store');
        Route::get('/kontraktor/papar/{kontraktor}', [KontraktorController::class, 'view'])->name('kontraktor.view');
        Route::get('/kontraktor/edit/{kontraktor}', [KontraktorController::class, 'edit'])->name('kontraktor.edit');
        Route::put('/kontraktor/kemaskini/{kontraktor}', [KontraktorController::class, 'update'])->name('kontraktor.update');
        Route::get('/kontraktor/suntingPBT/{kontraktor}', [KontraktorController::class, 'createPbtKontraktor'])->name('kontraktor.createPbtKontraktor');
        Route::post('/kontraktor/kemaskiniPBT/{kontraktor}', [KontraktorController::class, 'storePbtKontraktor'])->name('kontraktor.storePbtKontraktor');
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

    });

    Route::group(['prefix' => 'operasi', 'as' => 'operasi.'], function () {

        Route::get('/', [OperasiController::class, 'index'])->name('index');

        Route::get('/kospengurusansampah', [KosPengurusanSampahController::class, 'index'])->name('pengurusansampah.index');
    });

});
