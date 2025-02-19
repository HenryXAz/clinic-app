<?php

namespace App\Livewire\Pages\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Mary\Traits\Toast;

class ResetPassword extends Component
{
    use Toast;

    public $current_password;
    public $new_password;

    protected $rules = [
        'current_password' => ['required', 'min:6'],
        'new_password' => ['required', 'min:6'],
    ];

    public function render() 
    {
        return view('livewire.pages.auth.reset-password');
    }

    public function reset_password()
    {
        $this->validate();
        
        $user = Auth::user();
        $user_password = $user->password;

        if (!Hash::check($this->current_password, $user_password)) {
            $this->error('La contraseña actual no es la correcta', timeout: 3000); 
            return;
        }

        $updated_user = User::where('identifier', $user->identifier)
            ->first();
        $updated_user->update(['password' => Hash::make($this->new_password)]);
       
        $this->reset();        

        request()->session()->regenerate(); 
        $this->success("Se realizó el cambio correctamente", timeout: 3000);
    }

}