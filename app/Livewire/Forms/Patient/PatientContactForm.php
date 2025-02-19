<?php

namespace App\Livewire\Forms\Patient;

use App\Models\Patient;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PatientContactForm extends Form
{
    public ?string $phone = null;
    public ?string $personal_phone = null;

    public ?string $tutor_name = null;
    public ?string $tutor_relationship = null;
    public ?string $email = null;

    public function set_values(Patient $patient)
    {
        $this->fill([
            'phone' => $patient->phone,
            'personal_phone' => $patient->personal_phone,
            'tutor_name' => $patient->tutor_name,
            'tutor_relationship' => $patient->tutor_relationship,
            'email' => $patient->email,
        ]);
    }

    public function rules() : array
    {
        return [
            'phone' => [
                'string',
                'nullable',
            ],
            'personal_phone' => [
                'required',
                'string',
            ],
            'tutor_name' => [
                'string',
                'nullable',
            ],
            'tutor_relationship' => [
                'string',
                'nullable',
            ],
            'email' => [
                'nullable',
                'email',
            ],
        ];
    }

    protected $messages = [
        'phone.string' => 'El número de teléfono debe ser un texto.',
        'personal_phone.required' => 'El teléfono personal es obligatorio.',
        'personal_phone.string' => 'El teléfono personal debe ser un texto.',
        'tutor_name.string' => 'El nombre del tutor debe ser un texto.',
        'tutor_relationship.string' => 'La relación con el tutor debe ser un texto.',
        'email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
    ];
}
