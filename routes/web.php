<?php

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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/magazijn', [App\Http\Controllers\MagazijnController::class, 'index'])->name('magazijn.index');

Route::get('/magazijn/leverancier/{product}', [App\Http\Controllers\MagazijnController::class, 'leverancier'])->name('magazijn.leverancier');

Route::get('/magazijn/allergeen/{product}', [App\Http\Controllers\MagazijnController::class, 'allergeen'])->name('magazijn.allergeen');
