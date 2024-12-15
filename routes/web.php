<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Auth;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [UsersController::class, 'login']);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', [UsersController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    // Dashboard Pimpinan
    Route::get('/pimpinan/dashboard', function () {
        return view('pimpinan.dashboard');
    })->name('pimpinan.dashboard');

    Route::get('/pimpinan/daftarkegiatan', [KegiatanController::class, 'daftarKegiatan'])
        ->name('pimpinandaftarkegiatan.daftarKegiatan');

    Route::get('/pimpinan/kegiatan/download/{format}', [KegiatanController::class, 'download'])->name('pimpinandaftarkegiatan.download');

    Route::get('/pimpinan/kegiatan/print', [KegiatanController::class, 'printPage'])->name('pimpinandaftarkegiatan.print');

    // Rute untuk filter kegiatan
    Route::get('/pimpinan/kegiatan/filter', [KegiatanController::class, 'filter'])->name('pimpinandaftarkegiatan.filter');

    // Rute untuk Ajax search
    Route::post('/pimpinan/ajax-search', [KegiatanController::class, 'ajaxSearch'])->name('pimpinandaftarkegiatan.ajaxSearch');

    // Halaman Evaluasi Kegiatan untuk Pimpinan
    Route::get('/pimpinan/evaluasikegiatan', [EvaluasiController::class, 'evaluasiKegiatan'])
        ->name('pimpinan.evaluasikegiatan');

    Route::post('/pimpinan/evaluasikegiatan/store', [EvaluasiController::class, 'storeEvaluasi'])
        ->name('pimpinanevaluasikegiatan.store');

    Route::put('/pimpinan/evaluasikegiatan/edit', [EvaluasiController::class, 'edit'])
        ->name('pimpinanevaluasikegiatan.edit');

    // Dashboard Penanggung Jawab (PJ)
    Route::get('/pj/dashboard', function () {
        return view('pj.dashboard');
    })->name('pj.dashboard');

    Route::get('/pj/daftarkegiatan', [KegiatanController::class, 'daftarKegiatan'])
        ->name('pjdaftarkegiatan.daftarKegiatan');

    // Rute Tambah Kegiatan
    Route::get('/pj/tambahkegiatan', [KegiatanController::class, 'create'])->name('pjdaftarkegiatan.create');

    Route::post('/pj/tambahkegiatan', [KegiatanController::class, 'store'])->name('pjdaftarkegiatan.store');

    // Rute untuk Mengelola Kegiatan (CRUD)
    Route::resource('kegiatan', KegiatanController::class)->except(['show']);

    // Rute untuk Edit dan Update Kegiatan
    Route::get('/pj/kegiatan/{kegiatan}/edit', [KegiatanController::class, 'edit'])->name('pjdaftarkegiatan.edit');

    Route::put('/pj/kegiatan{kegiatan}', [KegiatanController::class, 'update'])->name('pjdaftarkegiatan.update');

    // Rute untuk Hapus Kegiatan
    Route::delete('/pj/kegiatan/{id}', [KegiatanController::class, 'destroy'])->name('pjdaftarkegiatan.destroy');

    Route::get('/pj/kegiatan/download/{format}', [KegiatanController::class, 'download'])->name('pjdaftarkegiatan.download');

    Route::get('/pj/kegiatan/print', [KegiatanController::class, 'printPage'])->name('pjdaftarkegiatan.print');

    // Rute untuk filter kegiatan
    Route::get('/pj/kegiatan/filter', [KegiatanController::class, 'filter'])->name('pjdaftarkegiatan.filter');

    // Rute untuk Ajax search
    Route::post('/pj/ajax-search', [KegiatanController::class, 'ajaxSearch'])->name('pjdaftarkegiatan.ajaxSearch');

    // Halaman Evaluasi Kegiatan untuk PJ
    Route::get('/pj/evaluasikegiatan', [EvaluasiController::class, 'evaluasiKegiatan'])
        ->name('pj.evaluasikegiatan');

    // Dashboard Anggota
    Route::get('/anggota/dashboard', function () {
        return view('anggota.dashboard');
    })->name('anggota.dashboard');

    Route::get('/anggota/daftarkegiatan', [KegiatanController::class, 'daftarKegiatan'])
        ->name('anggotadaftarkegiatan.daftarKegiatan');

    Route::get('/anggota/kegiatan/download/{format}', [KegiatanController::class, 'download'])->name('anggotadaftarkegiatan.download');

    Route::get('/anggota/kegiatan/print', [KegiatanController::class, 'printPage'])->name('anggotadaftarkegiatan.print');

    // Rute untuk filter kegiatan
    Route::get('/anggota/kegiatan/filter', [KegiatanController::class, 'filter'])->name('anggotadaftarkegiatan.filter');

    // Rute untuk Ajax search
    Route::post('/anggota/ajax-search', [KegiatanController::class, 'ajaxSearch'])->name('anggotadaftarkegiatan.ajaxSearch');

    Route::get('/anggota/notifikasikegiatan', [KegiatanController::class, 'getNotifikasiKegiatan']);

    // Rute untuk jadwal kegiatan pimpinan
    Route::get('/pimpinan/jadwalkegiatan', [JadwalController::class, 'index'])->name('pimpinan.jadwalkegiatan');
    
});

 
