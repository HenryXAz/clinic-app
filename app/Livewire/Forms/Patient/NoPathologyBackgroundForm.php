<?php

namespace App\Livewire\Forms\Patient;

use App\Models\Patient;
use Livewire\Attributes\Validate;
use Livewire\Form;

class NoPathologyBackgroundForm extends Form
{
    public bool $smoking = false;
    public ?int $how_many_smoke_per_day = null;
    public ?int $years_of_smoking_or_exposition = null;
    public bool $ex_smoker = false;
    public bool $passive_smoker = false;
    public bool $alcoholic = false;
    public ?int $ml_per_week = null;
    public ?int $alcohol_years_of_consumption = null;
    public bool $ex_alcoholic_or_ocasional = false;
    public bool $allergies = false;
    public ?string $allergies_description = null;

    public ?string $blood_type = null;
    public bool $basic_home_services = true;

    public bool $drug_dependency = false;
    public ?string $drug_dependency_description = null;
    public ?string $drug_dependency_years = null;

    public ?string $others_no_pathology_background = null;

    public function  set_values(Patient $patient)
    {
        $this->fill([
            'smoking' => $patient->smoking,
            'how_many_smoke_per_day' => $patient->how_many_smoke_per_day,
            'years_of_smoking_or_exposition' => $patient->years_of_smoking_or_exposition,
            'ex_smoker' => $patient->ex_smoker,
            'passive_smoker' => $patient->passive_smoker,
            'alcoholic' => $patient->alcoholic,
            'ml_per_week' => $patient->ml_per_week,
            'alcohol_years_of_consumption' => $patient->alcohol_years_of_consumption,
            'ex_alcoholic_or_ocasional' => $patient->ex_alcoholic_or_ocasional,
            'allergies' => $patient->allergies,
            'allergies_description' => $patient->allergies_description,
            'blood_tyoe' => $patient->blood_type,
            'basic_home_services' => $patient->basic_home_services,
            'drug_dependency' => $patient->drug_dependency,
            'drug_dependency_description' => $patient->drug_dependency_description,
            'drug_dependency_years' => $patient->drug_dependency_years,
            'others_no_pathology_background' => $patient->others_no_pathology_background,
        ]);
    }

    public function rules() : array
    {
        return [
            'smoking' => ['required', 'boolean'],
            'how_many_smoke_per_day' => ['nullable', 'numeric'],
            'years_of_smoking_or_exposition' => ['nullable', 'integer'],
            'ex_smoker' => ['nullable', 'boolean'],
            'passive_smoker' => ['nullable', 'boolean'],
            'alcoholic' => ['nullable', 'boolean'],
            'ml_per_week' => ['nullable', 'integer'],
            'alcohol_years_of_consumption' => ['nullable', 'integer'],
            'ex_alcoholic_or_ocasional' => ['nullable', 'boolean'],
            'allergies' => ['nullable', 'boolean'],
            'allergies_description' => ['nullable', 'string'],
            'blood_type' => ['nullable', 'string'],
            'basic_home_services' => ['nullable', 'boolean'],
            'drug_dependency' => ['nullable', 'boolean'],
            'drug_dependency_description' => ['nullable', 'string'],
            'drug_dependency_years' => ['nullable', 'string'],
            'others_no_pathology_background' => ['nullable', 'string'],
        ];
    }

    protected $messages = [
        'smoking.required' => 'El campo fumador es obligatorio.',
        'smoking.boolean' => 'El campo fumador debe ser verdadero o falso.',
        'how_many_smoke_per_day.numeric' => 'La cantidad de cigarrillos por día debe ser un número.',
        'years_of_smoking_or_exposition.integer' => 'Los años de fumador o exposición deben ser un número entero.',
        'ex_smoker.boolean' => 'El campo exfumador debe ser verdadero o falso.',
        'passive_smoker.boolean' => 'El campo fumador pasivo debe ser verdadero o falso.',
        'alcoholic.boolean' => 'El campo consumo de alcohol debe ser verdadero o falso.',
        'ml_per_week.integer' => 'La cantidad de ml de alcohol por semana debe ser un número entero.',
        'alcohol_years_of_consumption.integer' => 'Los años de consumo de alcohol deben ser un número entero.',
        'ex_alcoholic_or_ocasional.boolean' => 'El campo exalcohólico u ocasional debe ser verdadero o falso.',
        'allergies.boolean' => 'El campo alergias debe ser verdadero o falso.',
        'allergies_description.string' => 'La descripción de alergias debe ser un texto.',
        'blood_type.string' => 'El tipo de sangre debe ser un texto.',
        'basic_home_services.boolean' => 'El campo servicios básicos en el hogar debe ser verdadero o falso.',
        'drug_dependency.boolean' => 'El campo dependencia a drogas debe ser verdadero o falso.',
        'drug_dependency_description.string' => 'La descripción de dependencia a drogas debe ser un texto.',
        'drug_dependency_years.string' => 'Los años de dependencia a drogas deben ser un texto.',
        'others_no_pathology_background.string' => 'El campo otros antecedentes no patológicos debe ser un texto.',
    ];
}
