<?php

namespace App\Livewire\Admin\Doctor;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class All extends Component
{
    public function alertConfirm($id)
    {
        
        $this->dispatch( 'swal:confirm', type: 'warning', message: 'Are you sure?', text: 'If deleted, you will not be able to recover.', doctorId:$id);
    }
    
    public function delete($id)
    {
       
        Doctor::find($id)->delete();
        $this->dispatch('success', __('Department deleted successfully.'));
        $this->dispatch('refresh-department');
    }
    public function updateStatus($id)
    {
        $doctor = Doctor::find($id);
        $doctor->status = !$doctor->status; 
        $doctor->save();
        $this->dispatch('success', __('Doctor status updated successfully.'));
        $this->dispatch('refresh-department');
    }

    #[On('refresh-doctor')]
    #[Layout('components.layouts.admin')]
    public function render()
    {
        $doctors = Doctor::with('user', 'department')->get();
        return view('livewire.admin.doctor.all', [
            'doctors' => $doctors,
        ]);
    }
}
