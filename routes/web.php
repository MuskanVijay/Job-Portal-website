<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobPortalController;
use App\Http\Controllers\JobController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/', [JobPortalController::class, 'index'])->name('home');
Route::get('/job-listings', [JobPortalController::class, 'jobListings'])->name('job-listings');
Route::get('/about', [JobPortalController::class, 'about'])->name('about');


Route::resource('jobs', JobController::class);


require __DIR__.'/auth.php';
