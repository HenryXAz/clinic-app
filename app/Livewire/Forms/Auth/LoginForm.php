<?php

namespace App\Livewire\Forms\Auth;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate('required', message: 'el nombre de usuario es requerido')]
    public string $identifier = '';

    #[Validate('required', message: 'la contraseña es requerida')]
    #[Validate('min:6', message: 'la contraseña debe contener un mínimo de 6 caracteres')]
    public string $password = '';
}
