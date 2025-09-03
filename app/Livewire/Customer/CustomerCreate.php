<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;

class CustomerCreate extends Component
{
    public $name, $dni, $email, $password, $phone_number;
    public function render()
    {
        return view('livewire.customer.customer-create');
    }
    public function create()
    {
        $this->dispatch('show-create-customer');
    }
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'dni' => 'required',
            'email' => 'required',
            'password' => 'required',
            'phone_number' => 'required',
        ]);
        Customer::create([
            'name' => $this->name,
            'dni' => $this->dni,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'phone_number' => $this->phone_number
        ]);
        $this->resetForm();
        $this->dispatch('hide-create-customer');
        $this->dispatch('reload-customers');
        $this->dispatch(
            'toastMagic',
            status: 'success',
            title: 'Cliente creado',
            message: 'El cliente fue creado exitosamente.',
        );
    }
    public function resetForm()
    {
        $this->name = '';
        $this->dni = '';
        $this->email = '';
        $this->password = '';
        $this->phone_number = '';
    }
}
