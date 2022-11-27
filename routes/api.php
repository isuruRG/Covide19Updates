<?php

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
Route::group(['prefix' => 'auth'], function () {
    Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
    Route::post('login', [\App\Http\Controllers\AuthController::class,'login']);
    Route::get('logout', [\App\Http\Controllers\AuthController::class,'logout']);
    Route::group(['middleware' => ['jwt.verify']], function() {
        Route::get('user', [\App\Http\Controllers\AuthController::class,'getAuthenticatedUser']);
    });
});

Route::group(['prefix' => 'covid'], function () {
    Route::get('get-covid-updates', [\App\Http\Controllers\CovidDetailsController::class, 'getCovidDetails']);
});
Route::group(['prefix' => 'help-and-guide'], function () {
    Route::get('get-all-help-and-guides', [\App\Http\Controllers\HelpAndGuideController::class, 'getHelpAndGuide']);
});

Route::group(['middleware' => ['jwt.verify']], function () {
    Route::group(['prefix' => 'help-and-guide'], function () {
        Route::post('create-help-and-guid', [\App\Http\Controllers\HelpAndGuideController::class, 'createHelpAndGuideC']);
    });
});

