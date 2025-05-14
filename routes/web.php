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
use App\Http\Middleware\RoleMiddleware;
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
    Route::resource('users', UserController::class)->middleware(RoleMiddleware::class.':A');
    Route::resource('faculties', FacultyController::class)->middleware(RoleMiddleware::class.':A');
    Route::resource('programs', ProgramController::class)->middleware(RoleMiddleware::class.':A');
    Route::resource('organizations', OrganizationController::class)->middleware(RoleMiddleware::class.':A');
    Route::resource('periods', PeriodController::class)->middleware(RoleMiddleware::class.':O');
    Route::resource('candidates', CandidateController::class)->middleware(RoleMiddleware::class.':O');
    Route::resource('candidatedetails', CandidateDetailController::class)->middleware(RoleMiddleware::class.':O');
    Route::post('cardvotes/importstore', [CardVoteController::class, 'import_store'])->middleware(RoleMiddleware::class.':O')->name('cardvotes.import_store');
    Route::get('cardvotes/import', [CardVoteController::class, 'import'])->middleware(RoleMiddleware::class.':O')->name('cardvotes.import');
    Route::resource('cardvotes', CardVoteController::class)->middleware(RoleMiddleware::class.':O');
    Route::resource('voting', VotingController::class)->middleware(RoleMiddleware::class.':U');

});

require __DIR__.'/auth.php';
