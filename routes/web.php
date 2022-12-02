<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
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

// route resources 

Route::middleware('guest')->group(function () {

    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'store'])->name('register.store');
    
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login.store');
    
    Route::get('login/{user}/confirmation', [LoginController::class, 'confirmation'])->name('login.confirmation');
    Route::post('login/{user}/confirm', [LoginController::class, 'confirm'])->name('login.confirm');

});

Route::resource('/', ApplicationController::class)->names([
    'index' => 'application.index',
    'create' => 'application.create',
    'store' => 'application.store',
    'show' => 'application.show',
    'edit' => 'application.edit',
    'update' => 'application.update',
    'destroy' => 'application.destroy',
]);