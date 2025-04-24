<?php

namespace App\Livewire\Reception;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:4',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = Auth::user();
            
            // Check if user is reception and status is active
            if ($user->role !== 'reception') {
                Auth::logout();
                session()->flash('error', 'Unauthorized access.');
                return;
            }
            
            // Check user status
            if (!$user->isActive) {
                Auth::logout();
                session()->flash('error', 'Your account is currently inactive. Please contact administrator.');
                return;
            }

            return redirect()->route('reception.dashboard');
        }

        session()->flash('error', 'Invalid email or password.');
    }
    #[Layout('layouts.reception')]
    public function render()
    {
        return view('livewire.reception.login');
    }
}
