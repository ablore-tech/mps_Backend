<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\PhoneModelController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VariantController;
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
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('profile');

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('/brands', BrandController::class);

    Route::resource('/series', SeriesController::class);

    Route::resource('/phone-models', PhoneModelController::class);

    Route::resource('/variants', VariantController::class);

    Route::get('/edit-profile', [UserController::class, 'edit'])->name('edit-profile');

    Route::resource('/devices', DeviceController::class);

    Route::post('/user/{user}', [UserController::class, 'update'])->name('update-profile');
});