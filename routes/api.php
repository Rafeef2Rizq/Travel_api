<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\TourController;
use App\Http\Controllers\Api\V1\TravelController;
use App\Http\Controllers\Api\V1\Admin\TourController as AdminTourController;
use App\Http\Controllers\Api\V1\Admin\TravelController as AdminTravelController;
use App\Http\Middleware\RoleMiddleware;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(function () {
    Route::get('travels', [TravelController::class, 'index']);
    Route::get('travels/{travel:slug}/tours', [TourController::class, 'index']);
    Route::post('login', LoginController::class);
});

Route::prefix('v1/admin')->middleware(['auth:sanctum'])->group(function () {
    Route::middleware(['role:admin'])->group(function () {
        Route::post('travels', [AdminTravelController::class, 'store']);
        Route::post('travels/{travel}/tours', [AdminTourController::class, 'store']);
    });
    Route::put('travels/{travel}', [AdminTravelController::class, 'update']);
});
