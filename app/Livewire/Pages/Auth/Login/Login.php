<?php

namespace App\Livewire\Pages\Auth\Login;

use App\Livewire\Forms\Auth\LoginForm;
use App\Models\System;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Mary\Traits\Toast;

class Login extends Component
{
    use Toast;
   public LoginForm $form;

    #[Layout('components.layouts.guest')]
    public function render()
    {
        $logo = System::query()->select('logo')->first();
        return view('livewire.pages.auth.login.login',
            [
                'logo' => $logo,
            ]
        );
    }

    public function login()
    {
        $this->form->validate();

        $user = \App\Models\User::where('identifier', $this->form->identifier)->first();

        if ($user == null || !Hash::check($this->form->password, $user->password)) {
            $this->error('credenciales incorrectas o no existe el usuario', timeout: 3000);
            return;
        }

        Auth::login($user);
        $this->success('Autenticacion exitosa', timeout: 3000);
        $this->redirect(route('dashboard'), navigate: true);
    }
}
