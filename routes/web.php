<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\DashboardController;

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
    return view('welcome');
})->name('welcome'); //asigna un nombre a la ruta que devuelve la vista welcome

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//ESCRITURA DE RUTAS CON RESOURCE PARA RESUMIR RUTAS DE CRUD
Route::resource('movies', MovieController::class);
Route::resource('rooms', RoomController::class);
Route::resource('sales', SaleController::class);
