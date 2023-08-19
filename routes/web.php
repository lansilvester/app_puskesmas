<?php

use App\Http\Controllers\ApotekController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PoliklinikController;
use App\Http\Controllers\DokterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\RekamMedisPasienController;
use App\Http\Controllers\searchController;
use App\Http\Controllers\UsersController;
use App\Models\Apotek;
use App\Models\Pasien;
use App\Models\Poliklinik;
use App\Models\RekamMedis;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});

// View halaman login dan register
Route::get('login',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::get('register',[RegisterController::class,'index'])->name('register')->middleware('guest');
Route::get('logout', function(){
    return redirect('/');
});
Route::post('register',[RegisterController::class,'store']);
Route::post('login',[LoginController::class,'authenticate']);

// =========== Controller resource ===========

Route::middleware('auth')->group(function() {
    Route::resource('dashboard/users', UsersController::class);
    Route::get('change-password', [ChangePasswordController::class, 'index'])->name('change-password.index');
    Route::put('change-password', [ChangePasswordController::class, 'update'])->name('change-password.update');
    Route::resource('dashboard/dokter', DokterController::class);
// ======== FITUR SEARCH ========
    Route::get('dashboard/search_user', [searchController::class, 'search_user'])->name('search.user');
    Route::get('dashboard/search_pasien', [searchController::class, 'search_pasien'])->name('search.pasien');
    Route::get('dashboard/search_apotek', [searchController::class, 'search_apotek'])->name('search.apotek');
    Route::get('dashboard/search_rekam_medis', [searchController::class, 'search_rekam_medis'])->name('search.rekam_medis');

    Route::get('dashboard/pasien/{id}/downloadPDF', [PasienController::class,'downloadPDF'])->name('pasien.downloadPDF');

    Route::middleware(['auth', 'role:admin,apoteker'])->group(function(){
        Route::resource('dashboard/apotek', ApotekController::class);
    });

    Route::middleware(['auth', 'role:admin,pegawai'])->group(function(){
        Route::resource('dashboard/poliklinik', PoliklinikController::class);
    });
    Route::resource('dashboard/rekam_medis', RekamMedisController::class);
    Route::get('rekam_medis/download-pdf', [RekamMedisController::class, 'downloadPDF'])->name('rekam_medis.downloadPDF');
    Route::resource('dashboard/pasien', PasienController::class);   
    // ========== Menuju Dashboard ================
    Route::get('dashboard', function () {
        $data_user = User::all();
        $data_dokter = User::where('role','dokter')->with('dokter');
        $data_poliklinik  = Poliklinik::all();
        $data_apotek = Apotek::all();
        $data_rekam_medis = RekamMedis::all();
        $data_pasien = Pasien::all();
        return view('admin.dashboard', compact(
            'data_user',
            'data_dokter',
            'data_poliklinik',
            'data_apotek',
            'data_rekam_medis',
            'data_pasien'
        ));
    })->name('dashboard');    
    Route::post('logout',[LoginController::class,'logout']);
});