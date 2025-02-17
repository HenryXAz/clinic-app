<?php
use Illuminate\Support\Facades\Route;
use App\Livewire\Pages\Patients\Index;;
use \App\Livewire\Pages\Patients\Create;
use App\Livewire\Pages\Patients\Edit;

Route::prefix('pacientes')->middleware(['auth'])->group(function () {
    Route::get("", Index::class)
        ->name('patients.index');

    Route::get('/nuevo', Create::class)
        ->name('patients.create');

    Route::get('/{patient}/editar', Edit::class)
        ->name('patients.edit');
});
