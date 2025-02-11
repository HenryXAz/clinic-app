<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Dashboard\Index;

Route::get('/', function () {
    return redirect(route('auth.login'));
});

Route::get('/dashboard', Index::class)
    ->middleware('auth')
    ->name('dashboard');

if (config('app.env') == 'local') {
    Route::get('/test', \App\Livewire\Counter::class);
}


require_once __DIR__ . '/auth.php';
