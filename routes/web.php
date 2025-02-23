<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ControllerAdmin;

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

Route::get('/', function () { return view('welcome'); });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/dashboard', function () {
    return view('dashboard'); 
})->name('dashboard');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

// Administradores
Route::get('/admin', [ControllerAdmin::class, 'admin'])->name('admin');
Route::get('/altaAdmin', [ControllerAdmin::class, 'altaAdmin'])->name('altaAdmin');
Route::post('/registrarAdmin', [ControllerAdmin::class, 'registrarAdmin'])->name('registrarAdmin');
Route::get('/detalleAdmin/{id}', [ControllerAdmin::class, 'detalleAdmin'])->name('detalleAdmin');
Route::get('/editarAdmin/{id}/edit', [ControllerAdmin::class, 'editarAdmin'])->name('editarAdmin');
Route::put('/salvarAdmin/{id}', [ControllerAdmin::class, 'salvarAdmin'])->name('salvarAdmin');
Route::delete('/eliminarAdmin/{id}', [ControllerAdmin::class, 'eliminarAdmin'])->name('eliminarAdmin');