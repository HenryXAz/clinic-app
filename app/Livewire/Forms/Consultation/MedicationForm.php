<?php

namespace App\Livewire\Forms\Consultation;

use App\Models\CurrentMedication;
use App\Models\MedicalConsultation;
use Livewire\Attributes\Validate;
use Livewire\Form;

class MedicationForm extends Form
{
    public ?int $id = null;
    public ?string $trade_name = null;
    public ?string $active_ingredient  = null;
    public ?string $presentation_mg = '0.0';
    public ?string $dosage_mg = '0.0';
    public ?string $via = '';
    public ?string $frequency = '';
    public ?\Carbon\Carbon $last_administration_date = null;

    public function set_values(CurrentMedication $medicine): void
    {
        $this->fill([
            'id' => $medicine->id,
            'trade_name' => $medicine->trade_name,
            'active_ingredient' => $medicine->active_ingredient,
            'presentation_mg' => $medicine->presentation_mg,
            'dosage_mg' => $medicine->dosage_mg,
            'via' => $medicine->via,
            'frequency' => $medicine->frequency,
            'last_administration_date' => $medicine->last_administration_date,
        ]);
    }

    public function rules() : array
    {
        return [
            'trade_name' => ['required', 'string'],
            'active_ingredient' => ['required', 'string'],
            'presentation_mg' => ['nullable', 'regex:/^(0|[1-9]\d*)?(\.\d+)?(?<=\d)$/'],
            'dosage_mg' => ['required', 'regex:/^(0|[1-9]\d*)?(\.\d+)?(?<=\d)$/'],
            'via' => ['required', 'string'],
            'frequency' => ['required', 'string'],
            'last_administration_date' => ['required', 'date'],
        ];
    }

    protected $messages = [
        'trade_name.required' => 'El nombre comercial es obligatorio.',
        'trade_name.string' => 'El nombre comercial debe ser un texto.',
        'active_ingredient.required' => 'El principio activo es obligatorio.',
        'active_ingredient.string' => 'El principio activo debe ser un texto.',
        'presentation_mg.regex' => 'La presentación debe ser un número válido (ej. 500 o 500.5).',
        'dosage_mg.required' => 'La dosis es obligatoria.',
        'dosage_mg.regex' => 'La dosis debe ser un número válido (ej. 250 o 250.5).',
        'via.required' => 'La vía de administración es obligatoria.',
        'via.string' => 'La vía de administración debe ser un texto.',
        'frequency.required' => 'La frecuencia es obligatoria.',
        'frequency.string' => 'La frecuencia debe ser un texto.',
        'last_administration_date.required' => 'La fecha de última administración es obligatoria.',
        'last_administration_date.date' => 'La fecha de última administración debe ser una fecha válida.',
    ];
}
