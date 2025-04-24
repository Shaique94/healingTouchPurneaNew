<?php

namespace App\Livewire\Admin\Doctor;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\Qualification;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class Update extends Component
{
    use WithFileUploads;

    public $department;
    public $name, $email, $phone, $dept_id, $available_days = [];
    public $status;
    public $image;
    public $fee;
    public $doctorId;
    public $newImage;
    public $showModal;
    public $qualification;
    public $description;
    public $password; // Add this property
    
    public function openModal()
    {
    
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function mount()
    {
        $this->department = Department::all();
    }

    #[On('update-doctor')]
    public function edit($id)
    {
        $this->openModal();
        $doctor = Doctor::findOrFail($id);
        $this->name = $doctor->user->name;
        $this->email = $doctor->user->email;
        $this->phone = $doctor->user->phone;
        $this->fee = $doctor->fee;
        $this->dept_id = $doctor->department_id;
        $this->available_days = $doctor->available_days;
        $this->image = $doctor->image;
        $this->status = $doctor->status;
        $this->doctorId = $doctor->id;
        $this->qualification = $doctor->qualification;
        $this->description=$doctor->user->description;
    }


    public function updateDoctor()
    {
        $validationRules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Doctor::find($this->doctorId)->user_id,
            'phone' => 'required|string|max:10',
            'dept_id' => 'required|exists:departments,id',
            'available_days' => 'required|array|min:1',
            'status' => 'required|boolean',
            'newImage' => 'nullable|image|max:2048',
            'qualification' => 'required|string|min:1',
            'description' => 'nullable|string|max:1000',
            'password' => 'nullable|min:6', // Add password validation
        ];

        $this->validate($validationRules);

        $doctor = Doctor::findOrFail($this->doctorId);
        $user = User::findOrFail($doctor->user_id);

        $userData = [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'description' => $this->description,
        ];

        // Only update password if provided
        if (!empty($this->password)) {
            $userData['password'] = Hash::make($this->password);
        }

        $user->update($userData);

        if ($this->newImage) {
            $imagePath = $this->newImage->store('doctors', 'public');
            $doctor->image = $imagePath;
        }

        $doctor->update([
            'department_id' => $this->dept_id,
            'available_days' => $this->available_days,
            'qualification' => $this->qualification,
            'status' => $this->status,
        ]);

        $this->resetForm();

        $this->closeModal();
        $this->dispatch('refresh-doctor');
        $this->dispatch('success', __('Doctor updated successfully'));
    }

   

    public function resetForm()
    {
        $this->reset([
            'name',
            'email',
            'phone',
            'dept_id',
            'available_days',
            'image',
            'status',
            'newImage', 
            'doctorId',
            'password' // Add password to reset
        ]);
    }

    public function render()
    {
        return view('livewire.admin.doctor.update');
    }
}
