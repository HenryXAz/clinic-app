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
                'required',
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
