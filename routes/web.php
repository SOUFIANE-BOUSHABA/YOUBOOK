<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 

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