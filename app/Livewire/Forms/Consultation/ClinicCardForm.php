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
    public string $head_and_neck = '';
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
            'head_and_neck' => ['nullable', 'string'],
            'chest' => ['nullable', 'string'],
            'abdomen' => ['nullable', 'string'],
            'genitals' => ['nullable', 'string'],
            'limbs' => ['nullable', 'string'],
            'nervous_system' => ['nullable', 'string'],
        ];
    }

    protected $messages = [
        'blood_pressure.regex' => 'La presión arterial debe estar en el formato correcto (ej. 120/80).',
        'heart_rate.regex' => 'La frecuencia cardíaca debe ser un número entero.',
        'temperature.regex' => 'La temperatura debe ser un número entero.',
        'rheumatoid_factor.regex' => 'El factor reumatoide debe ser un número entero.',
        'weight.regex' => 'El peso debe ser un número válido (ej. 70 o 70.5).',
        'height.regex' => 'La altura debe ser un número válido (ej. 1.75).',
        'exterior_habitus.string' => 'El hábito exterior debe ser un texto.',
        'skin_and_appendages.string' => 'La piel y anexos deben ser un texto.',
        'head_and_neck.string' => 'La cabeza y cuello deben ser un texto.',
        'chest.string' => 'El tórax debe ser un texto.',
        'abdomen.string' => 'El abdomen debe ser un texto.',
        'genitals.string' => 'Los genitales deben ser un texto.',
        'limbs.string' => 'Las extremidades deben ser un texto.',
        'nervous_system.string' => 'El sistema nervioso debe ser un texto.',
    ];
}
