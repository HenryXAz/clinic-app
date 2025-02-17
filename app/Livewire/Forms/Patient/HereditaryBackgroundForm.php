<?php

namespace App\Livewire\Forms\Patient;

use App\Models\Patient;
use Livewire\Attributes\Validate;
use Livewire\Form;

class HereditaryBackgroundForm extends Form
{
    public ?string $diabetes = null;
    public ?string $nephropathy = null;
    public ?string $high_blood_pressure = null;
    public ?string $malformations = null;
    public ?string $malformations_type = null;
    public ?string $cancer = null;
    public ?string $cancer_type = null;
    public ?string $heart_disease = null;
    public ?string $others_hereditary_background  = null;

    public function set_values(Patient $patient)
    {
        $this->fill([
            'diabetes' => $patient->diabetes,
            'nephropathy' => $patient->nephropathy,
            'high_blood_pressure' => $patient->high_blood_pressure,
            'malformations' => $patient->malformations,
            'malformations_type' => $patient->malformations_type,
            'cancer' => $patient->cancer,
            'cancer_type' => $patient->cancer_type,
            'heart_disease' => $patient->heart_disease,
            'others_hereditary_background' => $patient->others_hereditary_background,
        ]);
    }


    public function rules() : array
    {
        return [
            'diabetes' => ['nullable', 'string'],
            'nephropathy' => ['nullable', 'string'],
            'high_blood_pressure' => ['nullable', 'string'],
            'malformations' => ['nullable', 'string'],
            'malformations_type' => ['nullable', 'string'],
            'cancer' => ['nullable', 'string'],
            'cancer_type' => ['nullable', 'string'],
            'heart_disease' => ['nullable', 'string'],
            'others_hereditary_background' => ['nullable', 'string'],
        ];
    }
}
