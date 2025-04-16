<?php

use App\Http\Middleware\AdminMiddleware;
use App\Livewire\Admin\Appointment\All as AllAppointment;
use App\Livewire\Admin\Career\AddCareer;
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Admin\Department\All as DeparmentAll;
use App\Livewire\Admin\Doctor\All as AllDoctor;
use App\Livewire\Admin\Index;
use App\Livewire\Admin\Login;
use App\Livewire\Admin\Logout;
use App\Livewire\Admin\Qualification\All as AllQualification;
use App\Livewire\Admin\User\All as AllUser;
use App\Livewire\PatientBooking\MenuItems\CareerDetail;
use Illuminate\Support\Facades\Route;
use App\Livewire\Appointment\AppoinmentForm;
use App\Livewire\Appointment\ConfirmAppointment;
use App\Livewire\Doctor\Dashboard;
use App\Livewire\Doctor\DoctorLogin;
use App\Livewire\PatientBooking\LandingPage;
use App\Livewire\PatientBooking\ManageAppointments;
use App\Livewire\PatientBooking\MenuItems\AboutUs;
use App\Livewire\PatientBooking\MenuItems\Careers;
use App\Livewire\PatientBooking\MenuItems\ContactPage;
use App\Livewire\PatientBooking\MenuItems\OurDoctors;
use App\Livewire\PatientBooking\MenuItems\Services;
use App\Livewire\Reception\Dashboard as ReceptionDashboard;
use App\Livewire\Reception\Login as ReceptionLogin;
use Illuminate\Console\View\Components\Confirm;
use Illuminate\Support\Facades\Auth;

// Route::view('/', 'comingsoon');
// Route::view('/home', 'welcome');

//user landing page
Route::get('/', LandingPage::class)->name('userlandingpage');


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


// Route for reception/counter
Route::get('/reception/login', ReceptionLogin::class)->name('reception.login');
Route::middleware('reception')->group(function () {
    Route::get('/reception/dashboard', ReceptionDashboard::class)->name('reception.dashboard');
});

// Patient Booking Routes
Route::get('/book-appointment', \App\Livewire\PatientBooking\BookAppointment::class)->name('book.appointment');
Route::get('/manage-appointments', ManageAppointments::class)->name('manage.appointments');
Route::get('/our-doctors', OurDoctors::class)->name('our.doctors');
Route::get('/careers', Careers::class)->name('careers.page');
Route::get('/career/{id}', CareerDetail::class)->name('career.detail');
Route::get('/services', Services::class)->name('services.page');
Route::get('/contact-us',ContactPage::class)->name('contact.page');
Route::get('/about-us',AboutUs::class)->name('about.page');

//Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/logout', Logout::class)->name('logout');
    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('/dashboard', AdminDashboard::class)->name('dashboard');
        Route::get('/department', DeparmentAll::class)->name('department');
        Route::get('/doctor', AllDoctor::class)->name('doctor');
        Route::get('/appointment', AllAppointment::class)->name('appointment');
        Route::get('/user',AllUser::class)->name('user');
        Route::get('/career',AddCareer::class)->name('add.career');
      
    });

});

//Doctor Routes
Route::get('doctor/login', DoctorLogin::class)->name('doctor.login');
Route::get('doctor/dashboard', Dashboard::class)->name('doctor.dashboard');

// SEO Routes
// Route::get('/doctors', function () {
//     return view('pages.doctors');
// })->name('doctors');

// Route::get('/services', function () {
//     return view('pages.services');
// })->name('services');

// Route::get('/about-us', function () {
//     return view('pages.about');
// })->name('about');

// Route::get('/contact-us', function () {
//     return view('pages.contact');
// })->name('contact');

// Route::get('/careers', function () {
//     return view('pages.careers');
// })->name('careers');

require __DIR__.'/auth.php';
