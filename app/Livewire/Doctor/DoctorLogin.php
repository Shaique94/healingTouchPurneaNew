<?php

namespace App\Livewire\Doctor;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class DoctorLogin extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;
    public $errorMessage = null;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ], $this->remember)) {
            if (auth()->user()->role === 'doctor') {
                return redirect()->route('doctor.dashboard');
            }
    
            Auth::logout();
            $this->errorMessage = 'Access denied. Only doctors can log in here.';
            return;
        }
    
        $this->errorMessage = 'Invalid email or password.';
    }
    #[Layout('layouts.doctor')]
    public function render()
    {
        return view('livewire.doctor.doctor-login');
    }
}
