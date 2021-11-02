<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\TableController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ActivityLogController;
use App\Http\Controllers\users\TableOrderController;
use App\Http\Controllers\users\SoldProductController;

Route::get('/', [DashboardController::class, 'index'])->middleware(['auth'])->name('admin.dashboard');

Route::prefix('product')->middleware(['auth'])->group(function () {
    Route::get('', [ProductController::class, 'index'])->name('product.index');
    Route::get('add', [ProductController::class, 'add'])->name('product.add');
    Route::post('', [ProductController::class, 'store'])->name('product.store');
});
Route::prefix('settings')->middleware(['auth'])->group(function () {
    Route::prefix('table')->group(function () {
        Route::get('', [TableController::class, 'index'])->name('table.index');
        Route::post('', [TableController::class, 'store'])->name('table.store');
    });
    Route::prefix('users')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('user.index');
        Route::post('', [UserController::class, 'store'])->name('user.store');
    });
    Route::prefix('profile')->group(function () {
        Route::get('', [UserController::class, 'profile'])->name('user.profile');
        Route::post('changePassword/{user}', [UserController::class, 'changePassword'])->name('user.change-password');
    });
    Route::get('/logs', [ActivityLogController::class, 'index'])->middleware(['auth'])->name('logs.index');
});
Route::prefix('order')->group(function () {
    Route::get('table/{table}', [TableOrderController::class, 'index'])->name('order.index');

    Route::post('table/{table}', [TableOrderController::class, 'store'])->name('order.store');
});
Route::prefix('report')->middleware(['auth'])->group(function (){
    Route::get('', [SoldProductController::class,'index'])->name('report.index');
    Route::get('{order}', [SoldProductController::class, 'show'])->name('report.show');
});
Route::get('order/device', [TableOrderController::class,'deviceIndex']);
Route::get('order/device/confirm', [TableOrderController::class,'deviceConfirm']);

require __DIR__ . '/auth.php';
