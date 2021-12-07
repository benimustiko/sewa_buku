<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DaftarSewaController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\BukumuController;
use App\Http\Controllers\SewaController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/home/{id}', [HomeController::class, 'show'])->name('show');

Route::middleware([is_admin::class])->group(function () {
    Route::get('/books', [BooksController::class, 'index'])->name('books');
    Route::get('/books/create', [BooksController::class, 'create'])->name('book.create');
    Route::post('/books', [BooksController::class, 'store'])->name('book.store');
    Route::get('/books/{id}', [BooksController::class, 'show'])->name('books.show');
    Route::get('/books/{id}/edit', [BooksController::class, 'edit'])->name('books.edit');
    Route::put('/books/{id}', [BooksController::class, 'update'])->name('book.update');
    Route::delete('/books/{id}', [BooksController::class, 'destroy'])->name('book.destroy');

    Route::get('/daftarsewa', [DaftarSewaController::class, 'index'])->name('daftarsewa');
    Route::get('/daftarsewa/export', [DaftarSewaController::class, 'export'])->name('export');
    Route::get('/daftarsewa/{id}', [DaftarSewaController::class, 'konfirmasi'])->name('daftarsewa.konfirmasi');
});

Route::get('/sewa/{id}', [SewaController::class, 'index'])->name('sewa');
Route::post('/sewa', [SewaController::class, 'sewa'])->name('submit');
Route::post('/sewa/checkout', [SewaController::class, 'checkout'])->name('checkout');

Route::get('/bukumu', [BukumuController::class, 'index'])->name('bukumu');
Route::get('/bukumu/{id}', [BukumuController::class, 'baca']);
Route::put('/bukumu/{id}', [BukumuController::class, 'kembalikan']);
