<?php
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobPortalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [JobPortalController::class, 'index'])->name('home');

Route::resource('jobs', JobController::class);
// Route for job listings
Route::get('job-listings', [JobPortalController::class, 'jobListings'])->name('job-listings');
// Route for about page
Route::get('about', [JobPortalController::class, 'about'])->name('about');
// Route for dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::post('jobs/{job}/apply', [JobApplicationController::class, 'apply'])->name('jobs.apply');

Route::prefix('profile')->group(function () {
    Route::get('edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('show/{id}', [ProfileController::class, 'show'])->name('profile.show');
});

Route::post('jobs/{job}/apply', [JobController::class, 'apply'])->name('jobs.apply');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
     ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
     ->name('logout');
     Route::middleware('auth')->group(function () {
        Route::get('/profile/create', [ProfileController::class, 'create'])->name('profile.create');
        Route::post('/profile', [ProfileController::class, 'store'])->name('profile.store');
        Route::get('/profile/{id}', [ProfileController::class, 'show'])->name('profile.show');
    });
    
 
    Route::middleware('auth')->group(function () {
        // Define the apply route with the correct name
        Route::post('/jobs/{job}/apply', [JobApplicationController::class, 'apply'])->name('jobs.apply');
    });

    
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);
    