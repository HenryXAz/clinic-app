<?php

namespace App\Http\Controllers;

use App\Models\MedicalConsultation;
use App\Models\MedicalConsultationDetail;
use App\Models\Patient;
use Illuminate\Http\Request;
//use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Auth;
use PDF;
class PatientHistoryDocumentController extends Controller
{
    public function generate_pdf(Patient $patient, MedicalConsultation $consultation)
    {
        $patient->load('birth_date_department');
        $patient->load('consultations');
        $patient->load('clinic_card');

        $consultation->load('current_medications');
        $consultation->load('details');
        $first_admission = count($patient->consultations) < 2;
        $system = \App\Models\System::first();
        $user = Auth::user();

        $current_medications = count($consultation->current_medications) > 0;
        $pdf = PDF::loadView('documents.patient-history-document', [
            'patient' => $patient,
            'first_admission' => $first_admission,
            'consultation' => $consultation,
            'current_medications' => $current_medications,
            'system' => $system,
            'user' => $user,
        ]);
        return $pdf->stream();
    }

}
