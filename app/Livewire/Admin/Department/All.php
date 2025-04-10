<?php

namespace App\Livewire\Admin\Department;

use App\Models\Department;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

class All extends Component
{
    public function alertConfirm($id)
    {
        
        $this->dispatch( 'swal:confirm', type: 'warning', message: 'Are you sure?', text: 'If deleted, you will not be able to recover.', departmentId: $id);
    }
    
    public function delete($id)
    {
       
        Department::find($id)->delete();
        $this->dispatch('success', __('Department deleted successfully.'));
        $this->dispatch('refresh-department');
    }

    public function updateStatus($id)
    {
        $dept = Department::find($id);
        $dept->status = !$dept->status; 
        $dept->save();
        $this->dispatch('success', __('Department status updated successfully.'));
        $this->dispatch('refresh-department');
    }


    #[On('refresh-department')]
    #[Layout('components.layouts.admin')]
    public function render()
    {
        $department=Department::all();

        return view('livewire.admin.department.all',[
            'departments' =>$department,
        ]);
    }
}
