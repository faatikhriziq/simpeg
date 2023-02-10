<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\KaryawanController;

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
    return view('dashboard', ['title' => 'Dashboard']);
})->middleware('auth')->name('index');


// Karyawan Routes
Route::get('/data-karyawan', [KaryawanController::class, 'indexData'])->middleware('auth')->name('karyawan');
Route::get('/data-riwayat', [RiwayatController::class, 'index'])->middleware('auth')->name('karyawan.riwayat');
Route::get('/add-karyawan', [KaryawanController::class, 'addData'])->middleware('auth')->name('karyawan.add');
Route::post('/store-karyawan', [KaryawanController::class, 'store'])->middleware('auth')->name('karyawan.store');
Route::delete('/delete-karyawan/{id}', [KaryawanController::class, 'delete'])->middleware('auth')->name('karyawan.delete');

// Login Routes
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// User Routes
Route::get('/add-user', [UserController::class, 'index'])->middleware('auth')->name('user.add');
Route::get('/data-user', [UserController::class, 'dataUser'])->middleware('auth')->name('user');
Route::post('/add-user', [UserController::class, 'store'])->middleware('auth')->name('user.store');
Route::delete('/delete-user/{id}', [UserController::class, 'delete'])->middleware('auth');
