<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class UserDelete extends Component
{
    public $user_id;
    public function render()
    {
        return view('livewire.user.user-delete');
    }
    #[On('delete-user')]
    public function delete($id)
    {
        $this->user_id = $id;
        $this->dispatch('show-delete-user');
    }
    public function destroy()
    {
        $user = User::find($this->user_id);
        $user->delete();
        $this->dispatch('hide-delete-user');
        $this->dispatch('reload-users');
    }
}
