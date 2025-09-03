<?php

namespace App\Livewire\Auth;

use Illuminate\Container\Attributes\Auth;
use Livewire\Component;

class Login extends Component
{
    public $dni, $password;
    public function render()
    {
        return view('livewire.auth.login');
    }
    public function login()
    {
        $this->validate([
            'dni' => 'required|numeric',
            'password' => 'required',
        ]);
        if (auth()->guard('web')->attempt(['dni' => $this->dni, 'password' => $this->password])) {
            return redirect()->route('inicio');
        }
        if (auth()->guard('customer')->attempt(['dni' => $this->dni, 'password' => $this->password])) {
            return redirect()->route('tickets');
        }
        return redirect()->route('login')->with('error', 'Credenciales incorrectas');
    }
    protected $messages = [
        'dni.required' => 'El DNI es requerido',
        'dni.numeric' => 'El DNI debe ser numérico',
        'password.required' => 'La contraseña es requerida',
    ];
}
