<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;





// THEME ROUTES
Route::controller(ThemeController::class)->name('theme.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/category', 'category')->name('category');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/blog-details', 'blogDetails')->name('blog-details');
});

// SUBSCRIBER ROUTES
Route::post('/subscribe/store', [SubscriberController::class, 'store'])->name('subscriber.store');
// CONTACT ROUTES
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');
// BLOG ROUTES
Route::resource('blogs', BlogController::class);
// AUTHENTICATION ROUTES
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
