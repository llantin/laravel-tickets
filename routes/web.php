<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->middleware('auth');

Route::get('/login', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::get('/logout', [\App\Http\Controllers\LogoutController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/inicio', function () {
    return view('home.index');
})->name('inicio')->middleware('auth');

Route::get('/tickets', function () {
    return view('tickets.index');
})->name('tickets');
Route::get('/tickets/json', [\App\Livewire\Ticket\Tickets::class, 'getTicketsJson']);
Route::get('/tickets/{customer_id}/json', [\App\Livewire\Ticket\Tickets::class, 'getTicketsPorClienteJson($customer_id)']);


Route::get('/usuarios', function () {
    return view('users.index');
})->name('usuarios');
Route::get('/usuarios/json', [\App\Livewire\User\Users::class, 'getUsuariosJson']);

Route::get('/clientes', function () {
    return view('customers.index');
})->name('clientes');
Route::get('/clientes/json', [\App\Livewire\Customer\Customers::class, 'getClientesJson']);
