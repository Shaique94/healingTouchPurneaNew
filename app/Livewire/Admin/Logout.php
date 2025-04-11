<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function mount(){
        $this->logout();
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    public function render()
    {
        return view('livewire.admin.logout');
    }
}
