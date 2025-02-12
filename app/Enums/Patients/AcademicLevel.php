<?php

namespace App\Enums\Patients;

enum AcademicLevel: string
{
    case ILLITERATE = 'Analfabeta';
    case PRIMARY = 'Primaria';
    case SECONDARY = 'Básico';
    case HIGH_SCHOOL = 'Diversificado';
    case UNIVERSITY = 'Universidad';
}
