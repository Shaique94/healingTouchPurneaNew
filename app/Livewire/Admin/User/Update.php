<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\Component;

class Update extends Component
{
    public $user = [
        'name' => '',
        'email' => '',
        'phone' => '',
        'role' => '',
        'status' => '',
        'password' => '',
    ];
    public $editId;

    // Dynamic rules method
    protected function rules()
    {
        return [
            'user.name' => 'required|string|max:255',
            'user.email' => 'required|email|unique:users,email,' . $this->editId,
            'user.phone' => 'nullable|string|max:20',
            'user.role' => 'required|in:admin,user,staff,reception',
            'user.status' => 'required',
            'user.password' => 'nullable|min:6'
        ];
    }

    public function update()
    {
        $validated = $this->validate();  // Now uses the dynamic rules()

        $user = User::findOrFail($this->editId);
        $user->name = $this->user['name'];
        $user->email = $this->user['email'];
        $user->phone = $this->user['phone'];
        $user->role = $this->user['role'];
        $user->isActive = $this->user['status'];

        if (!empty($this->user['password'])) {
            $user->password = Hash::make($this->user['password']);
        }

        $user->save();

        $this->resetForm();
        $this->dispatch('close-modal');
        $this->dispatch('success', __('User updated successfully'));
        $this->dispatch('refresh-user');
    }

    #[On('update-user')]
    public function edit($id)
    {
        $this->editId = $id;
        $user = User::findOrFail($id);

        $this->user = [
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'role' => $user->role,
            'status' => $user->isActive,
            'password' => '',
        ];
    }

    public function resetForm()
    {
        $this->user = [
            'name' => '',
            'email' => '',
            'phone' => '',
            'role' => '',
            'status' => '',
            'password' => '',
        ];
        $this->editId = null;
    }

    public function render()
    {
        return view('livewire.admin.user.update');
    }
}
