<?php

namespace App\Livewire\Forms\Patient;

use App\Enums\Patients\AcademicLevel;
use App\Enums\Patients\Ethnicity;
use App\Enums\Patients\Gender;
use App\Enums\Patients\MaritalStatus;
use App\Models\Patient;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PatientInfoForm extends Form
{
    public string $names = '';
    public string $last_names = '';
    public ?\Carbon\Carbon $birth_date = null;
    public ?string $community = null;
    public ?string $sector = null;
    public Gender $gender = Gender::M;
    public string $dpi = '';
    public ?Ethnicity $ethnicity = Ethnicity::GARIFUNA;
    public AcademicLevel $academic_level = AcademicLevel::ILLITERATE;
    public MaritalStatus $marital_status = MaritalStatus::SINGLE;
    public bool $is_working = true;
    public bool $is_immigrant = false;
    public string $profession = '';
    public ?int $birth_department = null;
    public ?int $department_id = null;
    public ?int $town_department_id = null;
    public ?string $religion = '';

    public function set_values(Patient $patient): void
    {
        $this->fill([
            'names' => $patient->names,
            'last_names' => $patient->last_names,
            'birth_date' => $patient->birth_date,
            'community' => $patient->community,
            'sector' => $patient->sector,
            'gender' => $patient->gender,
            'dpi' => $patient->dpi,
            'ethnicity' => $patient->ethnicity,
            'marital_status' => $patient->marital_status,
            'is_working' => $patient->is_working,
            'is_immigrant' => $patient->is_immigrant,
            'profession' => $patient->profession,
            'birth_department' => $patient->birth_department,
            'department_id' => $patient->department_id,
            'town_department_id' => $patient->town_department_id,
            'religion' => $patient->religion,
        ]);
    }

    public function rules(): array
    {
        return [
            'names' => [
                'required', 'string',
            ],
            'last_names' => [
                'required', 'string'
            ],
            'birth_date' => [
                'required', 'date',
            ],
            'community' => [
                'string',
                'nullable'
            ],
            'sector' => [
                'string',
                'nullable',
            ],
            'dpi' => [
                'string',
                'min:11'
            ],
            'gender' => [
                'required',
                Rule::enum(Gender::class),
            ],
            'religion' => [
                'nullable',
                'string',
            ],
            'ethnicity' => [
                'required',
                Rule::enum(Ethnicity::class),
            ],
            'academic_level' => [
                'required',
                Rule::enum(AcademicLevel::class),
            ],
            'marital_status' => [
                'required',
                Rule::enum(MaritalStatus::class),
            ],
            'is_working' => [
                'required',
                'boolean',
            ],
            'is_immigrant' => [
                'required',
                'boolean',
            ],
            'profession' => [
                'string',
            ],
            'birth_department' => [
                'required',
            ],
            'department_id' => [
                'required',
            ],
            'town_department_id' => [
                'required',
            ],
        ];
    }

    protected $messages = [
        'names.required' => 'El nombre es obligatorio.',
        'names.string' => 'El nombre debe ser un texto.',
        'last_names.required' => 'El apellido es obligatorio.',
        'last_names.string' => 'El apellido debe ser un texto.',
        'birth_date.required' => 'La fecha de nacimiento es obligatoria.',
        'birth_date.date' => 'La fecha de nacimiento debe ser una fecha válida.',
        'community.string' => 'La comunidad debe ser un texto.',
        'sector.string' => 'El sector debe ser un texto.',
        'dpi.required' => 'El DPI es obligatorio.',
        'dpi.string' => 'El DPI debe ser un texto.',
        'dpi.min' => 'El DPI debe tener al menos 11 caracteres.',
        'gender.required' => 'El género es obligatorio.',
        'gender' => 'El género seleccionado no es válido.',
        'religion.string' => 'La religión debe ser un texto.',
        'ethnicity.required' => 'La etnia es obligatoria.',
        'ethnicity' => 'La etnia seleccionada no es válida.',
        'academic_level.required' => 'El nivel académico es obligatorio.',
        'academic_level' => 'El nivel académico seleccionado no es válido.',
        'marital_status.required' => 'El estado civil es obligatorio.',
        'marital_status' => 'El estado civil seleccionado no es válido.',
        'is_working.required' => 'El campo "¿Está trabajando?" es obligatorio.',
        'is_working.boolean' => 'El campo "¿Está trabajando?" debe ser verdadero o falso.',
        'is_immigrant.required' => 'El campo "¿Es inmigrante?" es obligatorio.',
        'is_immigrant.boolean' => 'El campo "¿Es inmigrante?" debe ser verdadero o falso.',
        'profession.required' => 'La profesión es obligatoria.',
        'profession.string' => 'La profesión debe ser un texto.',
        'birth_department.required' => 'El departamento de nacimiento es obligatorio.',
        'department_id.required' => 'El departamento es obligatorio.',
        'town_department_id.required' => 'El municipio es obligatorio.',
    ];
}
