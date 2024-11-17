<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('terms', [\App\Http\Controllers\LegalController::class, 'terms'])->name('legal.terms');
Route::get('privacy', [\App\Http\Controllers\LegalController::class, 'privacy'])->name('legal.privacy');

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', \App\Livewire\Pages\Dashboard::class)->name('dashboard');

    Route::group(['prefix' => 'settings'], function () {
        Route::redirect('/', '/settings/account');
        Route::get('account', \App\Livewire\Pages\Settings\Account::class)->name('settings.account');
    });
});

Route::get('login', \App\Livewire\Auth\Login::class)->name('login');
Route::get('register', \App\Livewire\Auth\Register::class)->name('register');
Route::get('forgot-password', \App\Livewire\Auth\ForgotPassword::class)->name('password.request');
Route::get('reset-password/{token}', \App\Livewire\Auth\PasswordReset::class)->name('password.reset');
