<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\CandidateDetailController;
use App\Http\Controllers\CardVoteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PeriodController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VotingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('periods', PeriodController::class);
    Route::resource('faculties', FacultyController::class);
    Route::resource('programs', ProgramController::class);
    Route::resource('organizations', OrganizationController::class);
    Route::resource('candidates', CandidateController::class);
    Route::resource('candidatedetails', CandidateDetailController::class);
    Route::resource('cardvotes', CardVoteController::class);
    Route::resource('voting', VotingController::class);

});

require __DIR__.'/auth.php';
