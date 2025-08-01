<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\VerifyEmailController;
use Livewire\Volt\Volt;

/************************** User Routes *****************************/

Route::prefix('/')->middleware('guest')->group(function () {
    Volt::route('login', 'auth.login')->name('login');
    Volt::route('register', 'auth.register')->name('register');
    Volt::route('forgot-password', 'auth.forgot-password')->name('password.request');
    Volt::route('reset-password/{token}', 'auth.reset-password')->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Volt::route('verify-email', 'auth.verify-email')->name('verification.notice');
    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');
    Volt::route('confirm-password', 'auth.confirm-password')->name('password.confirm');
});

Route::post('logout', App\Livewire\Actions\Logout::class)->name('logout');



/************************** Admin Routes *****************************/

Route::prefix('admin')->name('admin.')->group(function () {
    // Guest (unauthenticated) admin routes
    Route::middleware('guest')->group(function () {
        Volt::route('login', 'admin.auth.login')->name('login');
        Volt::route('forgot-password', 'admin.auth.forgot-password')->name('password.request');
        Volt::route('reset-password/{token}', 'admin.auth.reset-password')->name('password.reset');
    });

    // Authenticated admin routes
    Route::middleware('auth')->group(function () {
        Volt::route('dashboard', 'admin.dashboard')->name('dashboard'); // example
        Volt::route('verify-email', 'admin.auth.verify-email')->name('verification.notice');
        Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');
        Volt::route('confirm-password', 'admin.auth.confirm-password')->name('password.confirm');
    });

   // Route::post('logout', App\Livewire\Actions\AdminLogout::class)->name('logout');
});
