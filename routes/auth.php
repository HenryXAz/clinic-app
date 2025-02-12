<?php
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Auth\Login\Login;


Route::get('/auth/login', Login::class)
    ->middleware('guest')
    ->name('login');

Route::post('/logout', function() {
    \Illuminate\Support\Facades\Auth::logout();
    return redirect()->route('login');
})->name('logout');
