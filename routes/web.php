<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
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

Route::controller(userController::class)->group(function () {
    Route::get('/', 'index_page');
    Route::post('/sign_up', 'sign_up');
    Route::post('/login', 'login');
    Route::get('/dashboard', 'dashboard');
    Route::post('/edit_book', 'edit_book');
    Route::post('/add_book', 'add_book');
    Route::post('/delete_book', 'delete_book');
    Route::post('/edit_issued_books', 'edit_issued_books');
    Route::post('/add_new_issued_book', 'add_new_issued_book');
    Route::get('/logout', 'logout');
});
