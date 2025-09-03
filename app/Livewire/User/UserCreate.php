<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class UserCreate extends Component
{
    public $name, $dni, $password, $role;
    public function render()
    {
        return view('livewire.user.user-create');
    }
    public function create()
    {
        $this->dispatch('show-create-user');
    }
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'dni' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);
        User::create([
            'name' => $this->name,
            'dni' => $this->dni,
            'password' => bcrypt($this->password),
            'role' => $this->role
        ]);
        $this->resetForm();
        $this->dispatch('hide-create-user');
        $this->dispatch('reload-users');
        $this->dispatch(
            'toastMagic',
            status: 'success',
            title: 'Usuario creado',
            message: 'El usuario fue creado exitosamente.',
        );
    }
    public function resetForm()
    {
        $this->name = '';
        $this->dni = '';
        $this->password = '';
        $this->role = '';
    }
}
