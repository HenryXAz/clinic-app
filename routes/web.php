<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Dashboard\Index;

Route::get('/', function () {
    return redirect(route('login'));
});

//Route::get('/dashboard', Index::class)
//    ->middleware('auth')
//    ->name('dashboard');

Route::get('/dashboard', function() {
    return redirect(route('patients.index'));
})->name('dashboard');

if (config('app.env') == 'local') {
    Route::get('/test', \App\Livewire\Counter::class);
}

Route::get('/test-pdf', [\App\Http\Controllers\PatientHistoryDocumentController::class , 'generate_pdf']);
