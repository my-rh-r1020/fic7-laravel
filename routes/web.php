<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
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
    return view('auth.login');
});

Route::middleware('auth', 'verified')->group(function () {
    Route::get('dashboard', function () {
        return view('pages.user.dashboard', ['type_menu' => '']);
    })->name('dashboard');
    Route::prefix('dashboard')->group(function () {
        // Profile
        Route::get('profile', function () {
            return view('pages.user.profile', ['type_menu' => '']);
        })->name('profile');

        Route::resource('category', CategoryController::class)->names(['index' => 'dashboard.categorydata']);
        Route::resource('product', ProductController::class)->names(['index' => 'dashboard.productdata']);
        Route::resource('order', OrderController::class)->names(['index' => 'dashboard.orderdata']);
        Route::resource('item', OrderItemController::class)->names(['index' => 'dashboard.orderitemdata']);
        Route::resource('role', RoleController::class)->names(['index' => 'dashboard.roledata']);
        // User Data
        Route::resource('user', UserController::class)->names(['index' => 'dashboard.userdata']);
    });
});
