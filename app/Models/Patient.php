<?php

namespace App\Models;

use App\Enums\Patients\AcademicLevel;
use App\Enums\Patients\Ethnicity;
use App\Enums\Patients\Gender;
use App\Enums\Patients\MaritalStatus;
use App\Traits\Common\SetModelEnumAttribute;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use SetModelEnumAttribute;

    protected $casts = [
        'academic_level' => AcademicLevel::class,
        'gender' => Gender::class,
        'marital_status' => MaritalStatus::class,
        'Ethnicity' => Ethnicity::class,
        'birth_date' => 'date',
    ];
    protected $guarded = [
        'id',
        'created_at',
    ];

    protected function setAcademicLevelAttribute(AcademicLevel $level) : void
    {
        $this->attributes['academic_level'] = $level->name;
    }

    protected function setGenderAttribute(Gender $gender) : void
    {
        $this->attributes['gender'] = $gender->name;
    }
    protected function setMaritalStatusAttribute(MaritalStatus $status) : void
    {
        $this->attributes['marital_status'] = $status->name;
    }

    protected function setEthnicityAttribute(Ethnicity $ethnicity) : void
    {
        $this->attributes['ethnicity'] = $ethnicity->name;
    }

    protected function getMaritalStatusAttribute(): MaritalStatus
    {
        return constant(MaritalStatus::class . "::{$this->attributes['marital_status']}");
    }

    protected function getEthnicityAttribute(): Ethnicity
    {
        return constant(Ethnicity::class . "::{$this->attributes['ethnicity']}");
    }

    protected function getGenderAttribute(): Gender
    {
        return constant(Gender::class . "::{$this->attributes['gender']}");
    }

    protected function getAcademicLevelAttribute(): AcademicLevel
    {
        return constant(AcademicLevel::class . "::{$this->attributes['academic_level']}");
    }

    protected function getFullNameAttribute(): string
    {
        return "$this->names $this->last_names";
    }

}
