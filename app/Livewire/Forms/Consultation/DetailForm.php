<?php

namespace App\Livewire\Forms\Consultation;

use App\Models\MedicalConsultationDetail;
use Livewire\Attributes\Validate;
use Livewire\Form;

class DetailForm extends Form
{
    public ?int $id = null;
    public ?string $description;

    public function set_values(MedicalConsultationDetail $detail) : void
    {
        $this->fill([
            'id' => $detail->id,
            'description' => $detail->description,
        ]);
    }

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
