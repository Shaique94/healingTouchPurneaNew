<?php

use App\Http\Middleware\AdminMiddleware;
use App\Livewire\Admin\Appointment\All as AllAppointment;
use App\Livewire\Admin\Department\All as DeparmentAll;
use App\Livewire\Admin\Doctor\All as AllDoctor;
use App\Livewire\Admin\Index;
use App\Livewire\Admin\Login;
use App\Livewire\Admin\Logout;
use App\Livewire\Admin\Qualification\All as AllQualification;
use Illuminate\Support\Facades\Route;
use App\Livewire\Appointment\AppoinmentForm;
use App\Livewire\Appointment\ConfirmAppointment;
use App\Livewire\Doctor\Dashboard;
use App\Livewire\Doctor\DoctorLogin;
use App\Livewire\PatientBooking\LandingPage;
use App\Livewire\Reception\Dashboard as ReceptionDashboard;
use App\Livewire\Reception\Login as ReceptionLogin;
use Illuminate\Console\View\Components\Confirm;
use Illuminate\Support\Facades\Auth;

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

// Route for reception/counter
Route::get('/reception/login', ReceptionLogin::class)->name('reception.login');
Route::get('/reception/dashboard',ReceptionDashboard::class)->name('reception.dashboard');

// Book Appointment Route
Route::get('/book-appointment', \App\Livewire\PatientBooking\BookAppointment::class)->name('book.appointment');
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/logout', Logout::class)->name('logout');
    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('/dashboard', Index::class)->name('dashboard');
        Route::get('/department', DeparmentAll::class)->name('department');
        Route::get('/doctor', AllDoctor::class)->name('doctor');
        Route::get('/qualification', AllQualification::class)->name('qualification');
        Route::get('/appointment', AllAppointment::class)->name('appointment');
      
    });

});

//Doctor Routes
Route::get('doctor/login', DoctorLogin::class)->name('doctor.login');
Route::get('doctor/dashboard', Dashboard::class)->name('doctor.dashboard');


require __DIR__.'/auth.php';
