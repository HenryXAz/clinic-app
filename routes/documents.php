<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PatientHistoryDocumentController;

Route::group(['middleware' => ['auth']], function () {

    Route::get('historial-clinico/{patient}/ingresos/{consultation}/ver',
        [PatientHistoryDocumentController::class, 'generate_pdf'])
        ->name('clinical_history.generate_pdf');
});
