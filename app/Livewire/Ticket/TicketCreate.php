<?php

namespace App\Livewire\Ticket;

use App\Models\Ticket;
use Livewire\Component;

class TicketCreate extends Component
{
    public $title, $description;
    public function render()
    {
        return view('livewire.ticket.ticket-create');
    }
    public function create()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Ticket::create([
            'title' => $this->title,
            'description' => $this->description,
            'customer_id' => auth()->guard('customer')->user()->id,
            'state' => 'Pendiente',
            'opened_at' => now(),
        ]);
        $this->resetForm();
        $this->dispatch('reload-tickets');
        $this->dispatch(
            'toastMagic',
            status: 'success',
            title: 'Ticket creado',
            message: 'Su ticket fue creado y será revisado pronto.',
        );
    }
    public function resetForm()
    {
        $this->title = '';
        $this->description = '';
    }
}
