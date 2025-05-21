<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/dashboard', [DashboardController::class, 'api'])->name('dashboard');

Route::get('/cardvote/{periodId}/{organizationId?}', [DashboardController::class, 'apicardvote'])->name('apicardvote');
