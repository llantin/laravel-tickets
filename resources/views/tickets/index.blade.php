@extends('layouts.app')
@section('title', 'Gestión')
@section('content')
    <div class="pc-content">
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12 d-flex justify-content-between align-items-center">
                        <div class="page-header-title">
                            <h2 class="m-b-10">@if (!auth()->guard('web')->check())
                                Nuevo ticket
                            @else Tickets @endif</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (!auth()->guard('web')->check())
            @livewire('ticket.ticket-create')
        @endif
        @livewire('ticket.tickets')
        @livewire('ticket.ticket-resolve')
    </div>
@endsection
