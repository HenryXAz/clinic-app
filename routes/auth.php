<?php
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Auth\Login\Login;


Route::get('/auth/login', Login::class)
    ->middleware('guest')
    ->name('auth.login');

Route::post('/logout', function() {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('auth.login');
})->name('auth.logout');
