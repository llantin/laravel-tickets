@extends('layouts.app')
@section('title', 'Clientes')
@section('content')
<div class="pc-content">
    @livewire('customer.customer-create')
    @livewire('customer.customer-edit')
    @livewire('customer.customer-delete')
    @livewire('customer.customers')
</div>
@endsection