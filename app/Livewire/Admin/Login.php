<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';

    public function mount()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
    
        // Simulate processing time
        sleep(2);
    
        $user = User::where('email', $this->email)->first();
    
        if (!$user) {
            $this->addError('email', 'No account found for this email.');
            return;
        }
    
        if (!Hash::check($this->password, $user->password)) {
            $this->addError('password', 'Incorrect password.');
            return;
        }
    
        if ($user->role !== 'admin') {
            $this->addError('email', 'Access denied. Admins only.');
            return;
        }
    
        Auth::login($user);
        session()->regenerate();
    
        return redirect()->intended('/admin/dashboard');
    }
    

    #[Layout('layouts.reception')]
    public function render()
    {
        return view('livewire.admin.login');
    }
}
