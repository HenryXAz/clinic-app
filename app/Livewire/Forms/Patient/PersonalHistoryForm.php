<?php

namespace App\Livewire\Forms\Patient;

use App\Models\Patient;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PersonalHistoryForm extends Form
{
    public ?string $childhood_diseases = null;
    public ?string $diseases_sequel = null;
    public bool $previous_hospitalizations = false;
    public ?string $previous_hospitalizations_description = null;
    public bool $surgical_history = false;
    public ?string $surgical_history_description = null;
    public bool $previous_transfusions = false;
    public ?string $previous_transfusions_description = null;
    public bool $fractures = false;
    public ?string $fractures_description = null;
    public bool $traumas = false;
    public ?string $traumas_description = null;
    public bool $other_disiases = false;
    public ?string $other_disiases_description = null;

    public function set_values(Patient $patient)
    {
        $this->fill([
            'childhood_diseases' => $patient->childhood_diseases,
            'diseases_sequel' => $patient->diseases_sequel,
            'previous_hospitalizations' => $patient->previous_hospitalizations,
            'previous_hospitalizations_description' => $patient->previous_hospitalizations_description,
            'surgical_history' => $patient->surgical_history,
            'surgical_history_description' => $patient->surgical_history_description,
            'previous_transfusions' => $patient->previous_transfusions,
            'previous_transfusions_description' => $patient->previous_transfusions_description,
            'fractures' => $patient->fractures,
            'fractures_description' => $patient->fractures_description,
            'traumas' => $patient->traumas,
            'traumas_description' => $patient->traumas_description,
            'other_disiases' => $patient->other_disiases,
            'other_disiases_description' => $patient->other_disiases_description,
        ]);
    }

    public function rules() : array
    {
        return [
            'childhood_diseases' => ['nullable', 'string'],
            'diseases_sequel' => ['nullable', 'string'],
            'previous_hospitalizations' => ['nullable', 'boolean'],
            'previous_hospitalizations_description' => ['nullable', 'string'],
            'surgical_history' => ['nullable', 'boolean'],
            'surgical_history_description' => ['nullable', 'string'],
            'previous_transfusions' => ['nullable', 'boolean'],
            'previous_transfusions_description' => ['nullable', 'string'],
            'fractures' => ['nullable', 'boolean'],
            'fractures_description' => ['nullable', 'string'],
            'traumas' => ['nullable', 'boolean'],
            'traumas_description' => ['nullable', 'string'],
            'other_disiases' => ['nullable', 'boolean'],
            'other_disiases_description' => ['nullable', 'string'],
        ];
    }

    protected $messages = [
        'childhood_diseases.string' => 'El campo enfermedades de la infancia debe ser un texto.',
        'diseases_sequel.string' => 'El campo secuelas de enfermedades debe ser un texto.',
        'previous_hospitalizations.boolean' => 'El campo hospitalizaciones previas debe ser verdadero o falso.',
        'previous_hospitalizations_description.string' => 'La descripción de hospitalizaciones previas debe ser un texto.',
        'surgical_history.boolean' => 'El campo historial quirúrgico debe ser verdadero o falso.',
        'surgical_history_description.string' => 'La descripción del historial quirúrgico debe ser un texto.',
        'previous_transfusions.boolean' => 'El campo transfusiones previas debe ser verdadero o falso.',
        'previous_transfusions_description.string' => 'La descripción de transfusiones previas debe ser un texto.',
        'fractures.boolean' => 'El campo fracturas debe ser verdadero o falso.',
        'fractures_description.string' => 'La descripción de fracturas debe ser un texto.',
        'traumas.boolean' => 'El campo traumas debe ser verdadero o falso.',
        'traumas_description.string' => 'La descripción de traumas debe ser un texto.',
        'other_disiases.boolean' => 'El campo otras enfermedades debe ser verdadero o falso.',
        'other_disiases_description.string' => 'La descripción de otras enfermedades debe ser un texto.',
    ];
}
