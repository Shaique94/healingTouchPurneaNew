<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    public function mount()
{
    if (Auth::check() && Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
}
    public $email, $password;

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Try to get user and verify role before login
        $credentials = ['email' => $this->email, 'password' => $this->password];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role !== 'admin') {
                Auth::logout();
                session()->flash('error', 'Access denied. Admins only.');
                return;
            }

            session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        session()->flash('error', 'Invalid credentials.');
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.admin.login');
    }
}
