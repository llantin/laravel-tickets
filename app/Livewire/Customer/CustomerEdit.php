<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Livewire\Attributes\On;
use Livewire\Component;

class CustomerEdit extends Component
{
    public $name, $dni, $email, $password, $phone_number, $customer_id;
    public function render()
    {
        return view('livewire.customer.customer-edit');
    }
    #[On('edit-customer')]
    public function edit($id)
    {
        $customer = Customer::find($id);
        $this->customer_id = $id;
        $this->name = $customer->name;
        $this->dni = $customer->dni;
        $this->email = $customer->email;
        $this->phone_number = $customer->phone_number;
        $this->dispatch('show-edit-customer');
    }
    public function update()
    {
        $this->validate([
            'name' => 'required',
            'dni' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
        ]);
        $customer = Customer::find($this->customer_id);
        $customer->name = $this->name;
        $customer->dni = $this->dni;
        $customer->email = $this->email;
        $customer->phone_number = $this->phone_number;
        $customer->save();
        $this->dispatch('hide-edit-customer');
        $this->dispatch('reload-customers');
        $this->dispatch(
            'toastMagic',
            status: 'success',
            title: 'Cliente actualizado',
            message: 'El cliente fue actualizado exitosamente.',
        );
    }
}
