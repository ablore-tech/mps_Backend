<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\DeviceController;
use App\Http\Controllers\Api\PhoneModelController;
use App\Http\Controllers\Api\VersionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'guest:sanctum'], function () {
    Route::post('send-otp', [RegisterController::class, 'sendOtp']);
    Route::post('otp-login', [LoginController::class, 'loginWithOtp']);

    Route::resource('brands', BrandController::class);

    Route::resource('cities', CityController::class);

    Route::resource('models', PhoneModelController::class);

    Route::get('brands/model/{brand_id}', [PhoneModelController::class, 'filterModel']);

	Route::get('models/series/{series_id}', [PhoneModelController::class, 'seriesShow']);

    // Route::get('brands/series/{brand_id}', 'API\serriesController@show_series');

    Route::get('devices/details/{model_id}', [DeviceController::class, 'filterDetails']);

    Route::resource('versions', VersionController::class);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
