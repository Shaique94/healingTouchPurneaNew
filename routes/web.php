<?php

use App\Livewire\Admin\Index;
use App\Livewire\Admin\Slot\All as SlotAll;
use Illuminate\Support\Facades\Route;
use App\Livewire\Appointment\AppoinmentForm;
use App\Livewire\Appointment\ConfirmAppointment;
use App\Livewire\Doctor\Dashboard;
use App\Livewire\Doctor\DoctorLogin;
use App\Livewire\PatientBooking\LandingPage;
use Illuminate\Console\View\Components\Confirm;

Route::view('/', 'comingsoon');
    
Route::view('/home', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::get('/appointments/create', AppoinmentForm::class)
    ->middleware('auth')
    ->name('appointments.create');

Route::get('/appointments/book/{patient}', ConfirmAppointment::class)->middleware('auth')->name('appointments.book');

Route::get('/userlandingpage', LandingPage::class)->name('userlandingpage');


// Book Appointment Route
Route::get('/book-appointment', \App\Livewire\PatientBooking\BookAppointment::class)->name('book.appointment');

Route::get('admin/',Index::class)->name('admin');
Route::get('admin/slot', SlotAll::class)->name('slot.all');

//Doctor Routes
Route::get('doctor/login', DoctorLogin::class)->name('doctor.login');
Route::get('doctor/dashboard', Dashboard::class)->name('doctor.dashboard');


require __DIR__.'/auth.php';
