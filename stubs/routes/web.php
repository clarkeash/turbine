<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', \App\Livewire\Pages\Dashboard::class)->name('dashboard');
    Route::get('settings', \App\Livewire\Pages\Settings::class)->name('settings');
});


Route::get('login', \App\Livewire\Auth\Login::class)->name('login');
Route::get('register', \App\Livewire\Auth\Register::class)->name('register');
Route::get('forgot-password', \App\Livewire\Auth\ForgotPassword::class)->name('password.request');
Route::get('reset-password/{token}', \App\Livewire\Auth\PasswordReset::class)->name('password.reset');
