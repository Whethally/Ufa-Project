<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->middleware('auth')->group(function(){

    Route::redirect('/', '/admin/dashboard');

    Route::resource('dashboard', AdminController::class)->names([
        'index' => 'dashboard.index',
        'create' => 'dashboard.create',
        'store' => 'dashboard.store',
        'show' => 'dashboard.show',
        'edit' => 'dashboard.edit',
        'destroy' => 'dashboard.destroy',
    ]);

});