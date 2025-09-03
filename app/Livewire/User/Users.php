<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Users extends Component
{
    public function render()
    {
        return view('livewire.user.users');
    }
    public function getUsuariosJson()
    {
        $usuarios = User::all();
        return response()->json([
            'data' => $usuarios
        ]);
    }
}
