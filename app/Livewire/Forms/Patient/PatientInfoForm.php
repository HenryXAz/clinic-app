<?php

namespace App\Livewire\Forms\Patient;

use App\Enums\Patients\AcademicLevel;
use App\Enums\Patients\Ethnicity;
use App\Enums\Patients\Gender;
use App\Enums\Patients\MaritalStatus;
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
                'required',
                'string',
                'min:11'
            ],
            'gender' => [
                'required',
                Rule::enum(Gender::class),
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
                'required',
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

}
