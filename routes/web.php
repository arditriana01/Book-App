<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\RatingController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('book.index');

Route::get('/authors', [AuthorController::class, 'index'])->name('author.index');

Route::get('/rating', [RatingController::class, 'create'])->name('rating.create');
Route::get('/rating/books/{authorId}', [RatingController::class, 'getBooksByAuthor']);
Route::post('/rating/store', [RatingController::class, 'store'])->name('rating.store');