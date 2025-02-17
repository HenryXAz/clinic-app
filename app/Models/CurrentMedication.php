<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CurrentMedication extends Model
{
    protected $casts = [
        'last_administration_date' => 'datetime',
    ];

    protected $guarded = [
        'id',
        'created_at',
    ];
}
