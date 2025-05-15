<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/dashboard', [\App\Http\Controllers\DashboardController::class, 'api'])->name('dashboard');

Route::get('/cardvote/{periodId}/{organizationId?}', [\App\Http\Controllers\DashboardController::class, 'apicardvote'])->name('apicardvote');
