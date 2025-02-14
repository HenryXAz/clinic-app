<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalConsultationDetail extends Model
{
    protected $table = 'medical_consultations_detail';
    protected $guarded = [
        'id',
        'created_at',
    ];

    public function consultation() : BelongsTo
    {
        return $this->belongsTo(MedicalConsultation::class, 'medical_consultation_id');
    }
}
