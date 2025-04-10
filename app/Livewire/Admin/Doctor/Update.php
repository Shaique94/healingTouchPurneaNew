<?php

namespace App\Livewire\Admin\Doctor;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;

    public $department;
    public $name, $email, $phone, $dept_id, $available_days = [], $checkAllDays = false;
    public $status;
    public $image;
    public $doctorId;
    public $newImage;

    public function mount()
    {
        $this->department = Department::all();
    }

    #[On('update-doctor')]
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $this->name = $doctor->user->name;
        $this->email = $doctor->user->email;
        $this->phone = $doctor->user->phone;
        $this->dept_id = $doctor->department_id;
        $this->available_days = $doctor->available_days;
        $this->image = $doctor->image;
        $this->status = $doctor->status;
        $this->doctorId = $doctor->id;
    }


    public function updateDoctor()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Doctor::find($this->doctorId)->user_id,
            'phone' => 'required|string|max:15',
            'dept_id' => 'required|exists:departments,id',
            'available_days' => 'required|array|min:1',
            'status' => 'required|boolean',
            'newImage' => 'nullable|image|max:2048',
        ]);

        $doctor = Doctor::findOrFail($this->doctorId);
        $user = User::findOrFail($doctor->user_id);

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
        ]);

        if ($this->newImage) {
            $imagePath = $this->newImage->store('doctors', 'public');
            $doctor->image = $imagePath;
        }

        $doctor->update([
            'department_id' => $this->dept_id,
            'available_days' => $this->available_days,
            'status' => $this->status,
        ]);

        $this->resetForm();

        $this->dispatch('close-modal');
        $this->dispatch('refresh-doctor');
        $this->dispatch('success', __('Doctor updated successfully'));
    }

    public function updatedCheckAllDays($value)
    {
        $this->available_days = $value
            ? ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']
            : [];
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
            'checkAllDays',
            'status',
            'newImage', 
            'doctorId'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.doctor.update');
    }
}
