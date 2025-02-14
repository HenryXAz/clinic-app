<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalConsultation extends Model
{
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    protected $guarded = [
        'id',
        'created_at',
    ];

    protected function getConsultationDateAttribute() : string
    {
        return "$this->attributes['start_date'] - $this->attributes['end_date']";
    }

}
