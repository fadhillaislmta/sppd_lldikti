<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\TransportasiController;
use App\Http\Controllers\PenginapanController;
use App\Http\Controllers\PusatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', [HomeController::class, 'index']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//karyawan
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
Route::get('/karyawan/create', [KaryawanController::class, 'create']);
Route::get('/karyawan/add', [KaryawanController::class, 'add']);
Route::post('/karyawan/insert', [KaryawanController::class, 'insert']);
Route::get('/karyawan/{id}/delete', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');
Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit']);
Route::post('/karyawan/update/{id}', [KaryawanController::class, 'update']);

//user
Route::get('/user', [UserController::class, 'index'])->name('user');
Route::get('/user/add', [UserController::class, 'add']);
Route::post('/user/insert', [UserController::class, 'insert']);
Route::get('/user/{id}/delete', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/user/update/{id}', [UserController::class, 'update']);

//lokasi
Route::get('/lokasi', [LokasiController::class, 'index'])->name('lokasi');
Route::get('/lokasi/create', [LokasiController::class, 'create']);
Route::get('/lokasi/add', [LokasiController::class, 'add']);
Route::post('/lokasi/insert', [LokasiController::class, 'insert']);
Route::get('/lokasi/{id}/delete', [LokasiController::class, 'destroy'])->name('lokasi.destroy');
Route::get('/lokasi/edit/{id}', [LokasiController::class, 'edit']);
Route::post('/lokasi/update/{id}', [LokasiController::class, 'update']);

//transportasi
Route::get('/transportasi', [TransportasiController::class, 'index'])->name('transportasi');
Route::get('/transportasi/create', [TransportasiController::class, 'create']);
Route::get('/transportasi/add', [TransportasiController::class, 'add']);
Route::post('/transportasi/insert', [TransportasiController::class, 'insert']);
Route::get('/transportasi/{id}/delete', [TransportasiController::class, 'destroy'])->name('transportasi.destroy');
Route::get('/transportasi/edit/{id}', [TransportasiController::class, 'edit']);
Route::post('/transportasi/update/{id}', [TransportasiController::class, 'update']);

//penginapan
Route::get('/penginapan', [PenginapanController::class, 'index'])->name('penginapan');
Route::get('/penginapan/create', [PenginapanController::class, 'create']);
Route::get('/penginapan/add', [PenginapanController::class, 'add']);
Route::post('/penginapan/insert', [PenginapanController::class, 'insert']);
Route::get('/penginapan/{id}/delete', [PenginapanController::class, 'destroy'])->name('penginapan.destroy');
Route::get('/penginapan/edit/{id}', [PenginapanController::class, 'edit']);
Route::post('/penginapan/update/{id}', [PenginapanController::class, 'update']);

// pusat
Route::get('/pusat', [PusatController::class, 'index'])->name('pusat');
Route::get('/pusat/create', [PusatController::class, 'create']);
Route::get('/pusat/add', [PusatController::class, 'add']);
Route::post('/pusat/insert', [PusatController::class, 'insert']);
Route::get('/pusat/{id}/delete', [PusatController::class, 'destroy'])->name('pusat.destroy');
Route::get('/pusat/edit/{id}', [PusatController::class, 'edit']);
Route::post('/pusat/update/{id}', [PusatController::class, 'update']);