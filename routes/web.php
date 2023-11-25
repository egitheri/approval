<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


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

Route::get('/', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/', [AuthController::class, 'cekLogin'])->name('cek-login');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::middleware(['auth'])->group(function () {
    Route::resource('cuti', CutiController::class);
    Route::put('/cuti/approve/{id}', [CutiController::class, 'approve'])->name('cuti.approve');
    Route::get('/cuti/detail/{id}', [CutiController::class, 'detail'])->name('cuti.detail');
    Route::get('/cuti/detail/{id}', [CutiController::class, 'detail'])->name('cuti.detail');
});
