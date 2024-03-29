<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Reservation;

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
    return view('app');
});

Route::get('/register', [AuthController::class, 'showForm'])->name('register');
Route::post('/registerUser', [AuthController::class, 'stor'])->name('registerUser');
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');  

Route::get('/booksAdmin' , [BookController::class, 'showBooks'])->name('show.books');


Route::post('/store/book', [BookController::class, 'store'])->name('store.books');

Route::delete('/delete/{id}',[BookController::class , 'delete'])->name('delete.book');
Route::put('/update/{id}' , [BookController::class , 'updateBook'])->name('edit.book');

Route::get('/reservation' , [ReservationController::class , 'show'])->name('show.reservetion');

Route::get('/showBookUser', [BookController::class, 'showBooksForUser'])->name('show.books.user');

Route::get('/details/book/{id}', [BookController::class, 'showDetailBook'])->name('details.book');

Route::post('/resrever' , [ReservationController::class , 'stor'])->name('stor.reservation');


Route::get('/test',  [BookController::class, 'search'])->name('search.books');