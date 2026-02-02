<?php

use App\Livewire\ExternalBookingForm;
use App\Livewire\RegistrationForm;
use App\Livewire\ReservationForm;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('home');
});

Route::get('/home2', function () {
    return view('home2');
});

// Route::redirect('/', '/admin');

 
Route::get('/book', ReservationForm::class)->name('book');

