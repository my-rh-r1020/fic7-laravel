<?php

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
        // User Data
        Route::resource('user', UserController::class)->names(['index' => 'dashboard.userdata']);
    });
});
