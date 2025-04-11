<?php

namespace App\Livewire\Admin\Doctor;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\Qualification;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Add extends Component
{
    use WithFileUploads;

    public $department;
    public $name, $email, $phone, $dept_id, $available_days = [], $checkAllDays = false;
    public $status;
    public $image;
    public $fee;
    public $qualification = [];
    public $qualifications;

    public function mount(){
        $this->department = Department::all();
        $this->qualifications = Qualification::all();
    }

    public function saveDoctor()
    {
        $data = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15',
            'dept_id' => 'required|exists:departments,id',
            'available_days' => 'required|array|min:1',
            'status' => 'required|boolean',
            'image' => 'nullable|image|max:2048',
            'fee' => 'required|numeric|min:0',
            'qualification' => 'required|array|min:1',
            
        ]);

        // Handle user creation
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'role' => 'doctor',
            'password' => Hash::make('healingtouch123'),
        ]);

        // Save image if uploaded
        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('doctors', 'public');
        }

        Doctor::create([
            'user_id' => $user->id,
            'department_id' => $this->dept_id,
            'status' => $this->status,
            'fee' => $this->fee,
            'available_days' => $this->available_days,
            'qualification' => $this->qualification,
            'image' => $imagePath,
        ]);

        $this->reset(['name', 'email', 'phone', 'dept_id', 'available_days', 'image', 'fee', 'checkAllDays', 'qualification']);
        $this->dispatch('close-modal');
        $this->dispatch('refresh-doctor');
        $this->dispatch('success', __('Doctor added successfully'));
    }

    public function updatedCheckAllDays($value)
    {
        $this->available_days = $value
            ? ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']
            : [];
    }


    public function render()
    {
        return view('livewire.admin.doctor.add');
    }
}
