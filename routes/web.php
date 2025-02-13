<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PendaftaranController;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PendaftaranController::class, 'index'])->name('pendaftarans.index');
Route::get('/pendaftaran/create', [PendaftaranController::class, 'create'])->name('pendaftarans.create');
Route::post('/pendaftaran/store', [PendaftaranController::class, 'store'])->name('pendaftarans.store');
