@extends('layouts.app')
@section('title', 'Usuarios')
@section('content')
<div class="pc-content">
    @livewire('user.user-create')
    @livewire('user.user-edit')
    @livewire('user.user-delete')
    @livewire('user.users')
</div>
@endsection