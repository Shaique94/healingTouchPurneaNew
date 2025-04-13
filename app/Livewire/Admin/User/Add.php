<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Add extends Component
{
    public $user = [
        'name' => '',
        'email' => '',
        'phone' => '',
        'role' => '',
        'status' => '',
        'password' => '',
    ];


    protected $rules = [
        'user.name' => 'required|string|max:255',
        'user.email' => 'required|email|unique:users,email',
        'user.phone' => 'nullable|string|max:20',
        'user.role' => 'required|in:admin,user,staff,reception',
        'user.status' => 'required',
        'user.password' => 'nullable|min:6'
    ];

    public function save()
    {
        $this->validate();
        User::create([
            'name' => $this->user['name'],
            'email' => $this->user['email'],
            'phone' => $this->user['phone'],
            'role' => $this->user['role'],
            'status' => $this->user['status'],
            'password' => Hash::make($this->user['password']),
        ]);
        $this->resetForm();
        $this->dispatch('close-modal');
        $this->dispatch('success', __('User added successfully'));
        $this->dispatch('refresh-user');

    }
    private function resetForm()
    {
        $this->user = [
            'name' => '',
            'email' => '',
            'phone' => '',
            'role' => '',
            'status' => '',
            'password' => '',
        ];
      
    }

    public function render()
    {
        return view('livewire.admin.user.add');
    }
}
