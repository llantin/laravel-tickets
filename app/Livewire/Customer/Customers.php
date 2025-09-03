<?php

namespace App\Livewire\Customer;

use App\Models\Customer;
use Livewire\Component;

class Customers extends Component
{
    public function render()
    {
        return view('livewire.customer.customers');
    }
    public function getClientesJson()
    {
        $clientes = Customer::all();
        return response()->json([
            'data' => $clientes
        ]);
    }
}
