<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;

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

Route::get('/libros', [LibroController::class, 'vista'])->name('libros.vista');
Route::post('/libros', [LibroController::class, 'store'])->name('libros.store');
Route::delete('/libros/{id}', [LibroController::class, 'destroy'])->name('libros.destroy');

Route::get('/', function () {
    return view('welcome');
});
