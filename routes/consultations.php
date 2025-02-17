<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Pages\Consultations\Index;
use App\Livewire\Pages\Consultations\Create;
use App\Livewire\Pages\Consultations\Edit;
use App\Livewire\Pages\Consultations\ClinicCards\Index as ClinicCard;

Route::prefix('/pacientes/{id}/consultas')->middleware(['auth'])->group(function () {

    Route::get('', Index::class)->name('consultations.index');
    Route::get('/nuevo', Create::class)
        ->name('consultations.create');
    Route::get('{consultation_id}/editar', Edit::class)
    ->name('consultations.edit');


    Route::get('ficha-clinica', ClinicCard::class)
        ->name('consultations.clinic_card.index');

});
