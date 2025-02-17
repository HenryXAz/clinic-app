<?php

namespace App\Livewire\Forms\Consultation;

use App\Models\ClinicCard;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ClinicCardForm extends Form
{
    public ?int $id = null;
    public string $blood_pressure = '';
    public string $heart_rate = '';
    public string $temperature = '';
    public string $rheumatoid_factor = '';
    public string $weight = '0.0';
    public string $height = '0.0';

    public string $exterior_habitus = '';
    public string $skin_and_appendages = '';
    public string $chest = '';
    public string $abdomen = '';
    public string $genitals = '';
    public string $limbs = '';
    public string $nervous_system = '';

    public function setClinicCard(ClinicCard $clinicCard)
    {
        $this->fill($clinicCard);
    }

    public function rules() : array
    {
        return [
            'blood_pressure' => ['nullable', 'regex:/^[0-9]+\/[0-9]+$/'],
            'heart_rate' => ['nullable', 'regex:/^[0-9]+$/'],
            'temperature' => ['nullable', 'regex:/^[0-9]+$/'],
            'rheumatoid_factor' => ['nullable', 'regex:/^[0-9]+$/'],
            'weight' => ['nullable', 'regex:/^(0|[1-9]\d*)?(\.\d+)?(?<=\d)$/'],
            'height' => ['nullable', 'regex:/^(0|[1-9]\d*)?(\.\d+)?(?<=\d)$/'],
            'exterior_habitus' => ['nullable', 'string'],
            'skin_and_appendages' => ['nullable', 'string'],
            'chest' => ['nullable', 'string'],
            'abdomen' => ['nullable', 'string'],
            'genitals' => ['nullable', 'string'],
            'limbs' => ['nullable', 'string'],
            'nervous_system' => ['nullable', 'string'],
        ];
    }

    protected $messages = [
        'blood_pressure' => [
            'regex' => 'Este no es un formato válido',
        ],
    ];
}
