<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\UniversityController;
use Illuminate\Support\Facades\Route;

// Homepage and visitor registration routes
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Route::get('/visitor/register', [VisitorController::class, 'showRegistrationForm'])->name('visitor.register');
Route::post('/visitor/register', [VisitorController::class, 'store'])->name('visitor.store');

// Debug route untuk check registration status
Route::get('/debug/visitor-status', function() {
    return response()->json([
        'session_visitor_id' => session('visitor_id'),
        'cookie_registered' => request()->cookie('visitor_registered'),
        'cookie_name' => request()->cookie('visitor_name'),
        'cookie_school' => request()->cookie('visitor_school'),
        'all_cookies' => request()->cookies->all(),
        'session_data' => session()->all()
    ]);
});



// University routes (protected by visitor registration)
Route::middleware('visitor.registered')->group(function () {
    Route::get('/universities', [UniversityController::class, 'index'])->name('universities.index');
    Route::get('/universitas/{slug}', [UniversityController::class, 'show'])->name('universities.show');
    Route::post('/universitas/{slug}/toggle-favorite', [UniversityController::class, 'toggleFavorite'])->name('universities.toggle-favorite');

    // API routes for modal
    Route::get('/api/universities/{university}', [UniversityController::class, 'getUniversityData'])->name('api.universities.show');
    Route::post('/universitas/{university}/toggle-favorite', [UniversityController::class, 'toggleFavoriteById'])->name('universities.toggle-favorite.id');

    // Favorite routes
    Route::get('/favorites', [App\Http\Controllers\FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites/toggle', [App\Http\Controllers\FavoriteController::class, 'toggle'])->name('favorites.toggle');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
