<?php

namespace App\Livewire\Ticket;

use App\Models\Ticket;
use Livewire\Attributes\On;
use Livewire\Component;

class TicketResolve extends Component
{
    public $ticket_id;
    public function render()
    {
        return view('livewire.ticket.ticket-resolve');
    }
    #[On('resolve-ticket')]
    public function resolve($id)
    {
        $this->ticket_id = $id;
        $this->dispatch('show-resolve-ticket');
    }
    public function update()
    {
        $ticket = Ticket::find($this->ticket_id);
        $ticket->state = 'Resuelto';
        $ticket->user_id = auth()->guard('web')->user()->id;
        $ticket->closed_at = now();
        $ticket->save();
        $this->dispatch('hide-resolve-ticket');
        $this->dispatch('reload-tickets');
        $this->dispatch(
            'toastMagic',
            status: 'success',
            title: 'Ticket resuelto',
            message: 'El ticket fue marcado como resuelto.',
        );
    }
}
