<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('user')->middleware('auth')->group(function(){

    Route::redirect('/', '/user/profile');

    Route::resource('profile', UserController::class)->names([
        'index' => 'profile.index',
        'create' => 'profile.create',
        'store' => 'profile.store',
        'show' => 'profile.show',
        'edit' => 'profile.edit',
        'destroy' => 'profile.destroy',
    ]);

    Route::get('logout', [UserController::class, 'logout'])->name('logout');

});