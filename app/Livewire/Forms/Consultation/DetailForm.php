<?php

namespace App\Livewire\Forms\Consultation;

use Livewire\Attributes\Validate;
use Livewire\Form;

class DetailForm extends Form
{
    public string $description;

    public function rules() : array
    {
        return [
            'description' => [
                'required',
                'string',
            ]
        ];
    }
}
