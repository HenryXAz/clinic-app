<?php

namespace App\Livewire\Forms\Consultation;

use App\Models\MedicalConsultation;
use Livewire\Form;

class ConsultationForm extends Form
{
    public ?\Carbon\Carbon $date = null;
    public bool $has_been_scheduled = false;
    public bool $has_been_completed = false;
    public ?string $reason = null;
    public ?string $beginning_and_evolution_of_current_condition = '';
    public ?string $respiratory_or_cardiovascular = '';
    public ?string $digestive = '';
    public ?string $endocrine = '';
    public ?string $muscle_skeletal = '';
    public ?string $genitourinary = '';
    public ?string $hematopoietic_lymphatic = '';
    public ?string $skin_and_appendages = '';
    public ?string $neurological_psychiatric = '';

    public ?string $previous_admission_laboratory_exams = '';
    public ?string $possible_diagnoses  = '';
    public ?string $study_plan = '';
    public ?string $initial_therapeutic = '';
    public ?string $condition = '';
    public ?string $prognosis = '';

    public function setConsultation(MedicalConsultation $consultation) : void
    {
        $this->fill([
            'date' => $consultation->date,
            'reason' => $consultation->reason,
            'beginning_and_evolution_of_current_condition' => $consultation->beginning_and_evolution_of_current_condition,
            'respiratory_or_cardiovascular' => $consultation->respiratory_or_cardiovascular,
            'digestive' => $consultation->digestive,
            'endocrine' => $consultation->endocrine,
            'muscle_skeletal' => $consultation->muscle_skeletal,
            'genitourinary' => $consultation->genitourinary,
            'hematopoietic_lymphatic' => $consultation->hematopoietic_lymphatic,
            'skin_and_appendages' => $consultation->skin_and_appendages,
            'neurological_psychiatric' => $consultation->neurological_psychiatric,
            'previous_admission_laboratory_exams' => $consultation->previous_admission_laboratory_exams,
            'possible_diagnoses' => $consultation->possible_diagnoses,
            'study_plan' => $consultation->study_plan,
            'initial_therapeutic' => $consultation->initial_therapeutic,
            'condition' => $consultation->condition,
            'prognosis' => $consultation->prognosis,
        ]);
    }

    public function rules() : array
    {
        return [
            'date' => ['required', 'date'],
            'has_been_scheduled' => ['required', 'boolean'],
            'has_been_completed' => ['required', 'boolean'],
            'reason' => ['required', 'string'],
            'beginning_and_evolution_of_current_condition' => ['nullable', 'string'],
            'respiratory_or_cardiovascular' => ['nullable', 'string'],
            'digestive' => ['nullable', 'string'],
            'endocrine' => ['nullable', 'string'],
            'muscle_skeletal' => ['nullable', 'string'],
            'genitourinary' => ['nullable', 'string'],
            'hematopoietic_lymphatic' => ['nullable', 'string'],
            'skin_and_appendages' => ['nullable', 'string'],
            'neurological_psychiatric' => ['nullable', 'string'],
            'previous_admission_laboratory_exams' => ['nullable', 'string'],
            'possible_diagnoses' => ['nullable', 'string'],
            'study_plan' => ['nullable', 'string'],
            'initial_therapeutic' => ['nullable', 'string'],
            'condition' => ['nullable', 'string'],
            'prognosis' => ['nullable', 'string'],
        ];
    }


//    public ?\Carbon\Carbon $start_date = null;
//    public ?string $treatment;
//    public ?string $diagnosis;
//
//    public function setConsultation(MedicalConsultation $consultation) : void
//    {
//        $this->fill([
//            'start_date' => $consultation->start_date,
//            'treatment' => $consultation->treatment,
//            'diagnosis' => $consultation->diagnosis,
//        ]);
//    }
//
//    public function rules() : array
//    {
//        return [
//            'treatment' => 'string|nullable',
//            'diagnosis' => 'string|nullable',
//            'start_date' => 'date|required',
//        ];
//    }
}
