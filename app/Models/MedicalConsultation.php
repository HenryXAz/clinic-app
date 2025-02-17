<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalConsultation extends Model
{
    protected $casts = [
        'date' => 'datetime',
//        'start_date' => 'datetime',
//        'end_date' => 'datetime',
    ];

    protected $guarded = [
        'id',
        'created_at',
    ];

    protected function getConsultationDateAttribute() : string
    {
        return "$this->attributes['start_date'] - $this->attributes['end_date']";
    }

    protected function getReasonAbbreviationAttribute() : string
    {
        $value = substr($this->attributes['reason'], 0, 20);

        if (strlen($value) >= 20) {
            $value.='...';
        }

        return $value;
//        return substr($this->attributes['reason'], 0, 20) . '...';
    }

}
