<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Livewire\Attributes\On;
use Livewire\Component;

class CustomerDelete extends Component
{
    public $customer_id;
    public function render()
    {
        return view('livewire.customer.customer-delete');
    }
    #[On('delete-customer')]
    public function delete($id)
    {
        $this->customer_id = $id;
        $this->dispatch('show-delete-customer');
    }
    public function destroy()
    {
        $customer = Customer::find($this->customer_id);
        $customer->delete();
        $this->dispatch('hide-delete-customer');
        $this->dispatch('reload-customers');
    }
}
