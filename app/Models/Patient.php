<?php

namespace App\Models;

use App\Enums\Patients\AcademicLevel;
use App\Enums\Patients\Ethnicity;
use App\Enums\Patients\Gender;
use App\Enums\Patients\MaritalStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Patient extends Model
{
    protected $casts = [
        'academic_level' => AcademicLevel::class,
        'gender' => Gender::class,
        'marital_status' => MaritalStatus::class,
        'Ethnicity' => Ethnicity::class,
        'birth_date' => 'date',
        'last_menstruation_date' => 'date',
        'last_cytology_date' => 'date',
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

    public function department() : BelongsTo
    {
        return $this->belongsTo(CountryDepartment::class, 'department_id');
    }

    public function town() : BelongsTo
    {
        return $this->belongsTo(CountryTown::class, 'town_department_id');
    }

    public function birth_date_department() : BelongsTo
    {
        return $this->belongsTo(CountryDepartment::class, 'birth_department');
    }

    public function consultations() : HasMany
    {
        return $this->hasMany(MedicalConsultation::class);
    }

    public function clinic_card() : HasOne
    {
//        return $this->hasMany(ClinicCard::class);
        return $this->hasOne(ClinicCard::class);
    }
}
