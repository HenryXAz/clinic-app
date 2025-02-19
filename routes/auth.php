<?php
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Auth\Login\Login;
use App\Livewire\Pages\Auth\ResetPassword;

Route::get('/auth/login', Login::class)
    ->middleware('guest')
    ->name('login');

Route::post('/logout', function() {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('login');
})->name('logout');


Route::get('/cambiar-contraseña', ResetPassword::class)
    ->middleware('auth')
    ->name('reset_password');
