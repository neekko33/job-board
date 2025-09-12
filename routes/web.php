<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyJobApplicationController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\MyJobController;

Route::get('/', fn() => to_route('jobs.index'));

Route::resource('jobs', JobController::class);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::resource('job.application', JobApplicationController::class)->only(['create', 'store']);
    Route::resource('my-job-applications', MyJobApplicationController::class)->only(['index', 'destroy']);
    Route::resource('employer', EmployerController::class)->only(['create', 'store', 'edit', 'update']);
    Route::resource('my-jobs', MyJobController::class);
});
