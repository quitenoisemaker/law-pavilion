<?php

use App\Http\Controllers\ClientDetailController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('clients')->group(function () {
    Route::get('/index', [ClientDetailController::class, 'index'])->name('clients.index');
    Route::get('/create', [ClientDetailController::class, 'create'])->name('clients.create');
    Route::post('/store', [ClientDetailController::class, 'store'])->name('clients.store');
    Route::get('/filter', [ClientDetailController::class, 'filter'])->name('clients.filter');
});
