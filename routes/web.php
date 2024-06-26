<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardDonasiController;


Route::get('/', function () {
    return view('landingpage');
});

Route::get('/kebijakanprivasi', function () {
    return view('kebijakanprivasi');
});

Route::get('/tentangkami', function () {
    return view('tentangkami');
});
//Rute Registrasi
Route::get('/registrasi', [RegisterController::class, 'register'])->middleware('guest');
Route::post('/registrasi', [RegisterController::class, 'store']);
//Rute Login & Logout
Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
//Rute Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboardadmin', [DashboardController::class, 'admin'])->middleware('auth');
//Rute Donasi
Route::get('/dashboard/riwayatdonasi', [DashboardController::class, 'indexriwayatdonasi'])->middleware('auth');
//Route::get('/dashboard/detaildonasi', [DashboardDonasiController::class, 'indexdetaildonasi'])->middleware('auth');
Route::get('/donasi', [DashboardDonasiController::class, 'donasinow']);
Route::post('/donasi', [DashboardDonasiController::class, 'store']);
Route::get('/dashboard/donasi/formsuccess', [DashboardDonasiController::class, 'successform']);