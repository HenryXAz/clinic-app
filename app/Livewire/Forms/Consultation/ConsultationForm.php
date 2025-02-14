<?php

namespace App\Livewire\Forms\Consultation;

use App\Models\MedicalConsultation;
use Livewire\Form;

class ConsultationForm extends Form
{
    public ?\Carbon\Carbon $start_date = null;
    public ?string $treatment;
    public ?string $diagnosis;

    public function setConsultation(MedicalConsultation $consultation) : void
    {
        $this->fill([
            'start_date' => $consultation->start_date,
            'treatment' => $consultation->treatment,
            'diagnosis' => $consultation->diagnosis,
        ]);
    }

    public function rules() : array
    {
        return [
            'treatment' => 'string|nullable',
            'diagnosis' => 'string|nullable',
            'start_date' => 'date|required',
        ];
    }
}
