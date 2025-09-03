<?php

namespace App\Livewire\Ticket;

use App\Models\Ticket;
use Livewire\Component;

class Tickets extends Component
{
    public function render()
    {
        return view('livewire.ticket.tickets');
    }
    public function getTicketsJson()
    {
        $tickets = Ticket::all();
        return response()->json([
            'data' => $tickets
        ]);
    }
    public function getTicketsPorClienteJson($customer_id)
    {
        $tickets = Ticket::where('customer_id', $customer_id)->get();
        return response()->json([
            'data' => $tickets
        ]);
    }
}
