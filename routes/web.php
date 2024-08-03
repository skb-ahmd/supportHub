<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return Auth::check() ? redirect()->route('agents.index') : redirect()->route('ticket.submit.form');
});


Route::prefix('tickets')->middleware('guest')->group(function () {
    Route::get('/submit', [TicketController::class, 'ticketForm'])->name('ticket.submit.form');
    Route::post('/submit', [TicketController::class, 'submitTicket'])->name('ticket.submit');
    Route::get('/status', [TicketController::class, 'statusForm'])->name('ticket.status.form');
    Route::post('/status', [TicketController::class, 'checkStatus'])->name('ticket.status.check');
});


Route::prefix('agents')->middleware('guest')->group(function () {
    Route::get('/login', [AgentController::class, 'loginForm'])->name('agents.login.form');
    Route::post('/login', [AgentController::class, 'login'])->name('agents.login');
    Route::get('/register', [AgentController::class, 'registerForm'])->name('agents.register.form');
    Route::post('/register', [AgentController::class, 'register'])->name('agents.register');
});


Route::prefix('agents')->middleware('auth')->group(function () {
    Route::get('/index', [AgentController::class, 'index'])->name('agents.index');
    Route::get('/logout', [AgentController::class, 'logout'])->name('agents.logout');
});
Route::prefix('tickets')->middleware('auth')->group(function () {
    Route::get('/{id}', [TicketController::class, 'show'])->name('tickets.show');
    Route::post('/{id}/reply', [TicketController::class, 'reply'])->name('tickets.reply');
    Route::patch('/{id}/status', [TicketController::class, 'updateStatus'])->name('tickets.update.status');
});
