<?php

namespace App\Enums\Patients;

enum MaritalStatus: string
{
    case SINGLE = 'Soltero/a';
    case MARRIED = 'Casado/a';
    case DIVORCED = 'Divorciado/a';
    case WIDOWER = 'Viudo/a';
}
