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

    protected $messages = [
        'date.required' => 'La fecha es obligatoria.',
        'date.date' => 'La fecha debe ser una fecha válida.',
        'has_been_scheduled.required' => 'El campo de programación es obligatorio.',
        'has_been_scheduled.boolean' => 'El valor de programación debe ser verdadero o falso.',
        'has_been_completed.required' => 'El campo de finalización es obligatorio.',
        'has_been_completed.boolean' => 'El valor de finalización debe ser verdadero o falso.',
        'reason.required' => 'El motivo es obligatorio.',
        'reason.string' => 'El motivo debe ser un texto.',
        'beginning_and_evolution_of_current_condition.string' => 'El inicio y evolución de la condición actual debe ser un texto.',
        'respiratory_or_cardiovascular.string' => 'El campo respiratorio o cardiovascular debe ser un texto.',
        'digestive.string' => 'El campo digestivo debe ser un texto.',
        'endocrine.string' => 'El campo endocrino debe ser un texto.',
        'muscle_skeletal.string' => 'El campo músculo-esquelético debe ser un texto.',
        'genitourinary.string' => 'El campo genitourinario debe ser un texto.',
        'hematopoietic_lymphatic.string' => 'El campo hematopoyético y linfático debe ser un texto.',
        'skin_and_appendages.string' => 'El campo piel y anexos debe ser un texto.',
        'neurological_psychiatric.string' => 'El campo neurológico y psiquiátrico debe ser un texto.',
        'previous_admission_laboratory_exams.string' => 'El campo de exámenes de laboratorio previos al ingreso debe ser un texto.',
        'possible_diagnoses.string' => 'El campo de posibles diagnósticos debe ser un texto.',
        'study_plan.string' => 'El campo de plan de estudios debe ser un texto.',
        'initial_therapeutic.string' => 'El campo de tratamiento inicial debe ser un texto.',
        'condition.string' => 'El campo de condición debe ser un texto.',
        'prognosis.string' => 'El campo de pronóstico debe ser un texto.',
    ];
}
