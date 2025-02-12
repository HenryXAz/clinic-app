<?php

namespace App\Livewire\Forms\Patient;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PatientContactForm extends Form
{
    public ?string $phone = null;
    public ?string $personal_phone = null;

    public ?string $tutor_name = null;
    public ?string $tutor_relationship = null;
    public ?string $email = null;

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
}
