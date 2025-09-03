<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class UserEdit extends Component
{
    public $name, $dni, $role, $user_id;
    public function render()
    {
        return view('livewire.user.user-edit');
    }
    #[On('edit-user')]
    public function edit($id)
    {
        $user = User::find($id);
        $this->user_id = $id;
        $this->name = $user->name;
        $this->dni = $user->dni;
        $this->role = $user->role;
        $this->dispatch('show-edit-user');
    }
    public function update()
    {
        $this->validate([
            'name' => 'required',
            'dni' => 'required',
            'role' => 'required',
        ]);
        $user = User::find($this->user_id);
        $user->name = $this->name;
        $user->dni = $this->dni;
        $user->role = $this->role;
        $user->save();
        $this->dispatch('hide-edit-user');
        $this->dispatch('reload-users');
        $this->dispatch(
            'toastMagic',
            status: 'success',
            title: 'Usuario actualizado',
            message: 'El usuario fue actualizado exitosamente.',
        );
    }
}
