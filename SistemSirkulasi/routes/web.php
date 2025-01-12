<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\LandingPageController;

Route::get('/', [LandingPageController::class, 'index']);




use App\Http\Controllers\PeminjamanController;

Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
Route::post('/peminjaman', [PeminjamanController::class, 'store'])->name('peminjaman.store');
Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');


use App\Http\Controllers\PengembalianController;

Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian.index');

use App\Http\Controllers\BookController;

// Route untuk halaman utama data buku
Route::get('/databuku', [BookController::class, 'index'])->name('books.index');

// Route untuk tambah data buku
Route::get('/databuku/create', [BookController::class, 'create'])->name('books.create');
Route::post('/databuku', [BookController::class, 'store'])->name('books.store');

// Route untuk edit data buku
Route::get('/databuku/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/databuku/{book}', [BookController::class, 'update'])->name('books.update');

// Route untuk hapus data buku
Route::delete('/databuku/{book}', [BookController::class, 'destroy'])->name('books.destroy');
