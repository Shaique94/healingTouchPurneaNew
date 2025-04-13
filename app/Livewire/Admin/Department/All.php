<?php

namespace App\Livewire\Admin\Department;

use App\Models\Department;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
    use WithPagination;
    
    public $searchTerm = '';
    public $statusFilter = 'all';
    public $perPage = 10;

    public function alertConfirm($id)
    {
        $this->dispatch( 'swal:confirm', type: 'warning', message: 'Are you sure?', text: 'If deleted, you will not be able to recover this', departmentId: $id);

    }
    
    public function delete($id)
    {
        Department::find($id)->delete();
        $this->dispatch('success', __('Department deleted successfully.'));
    }

    public function updateStatus($id)
    {
        $dept = Department::find($id);
        $dept->status = !$dept->status;
        $dept->save();
        $this->dispatch('success', __('Department status updated successfully.'));
    }

    #[On('refresh-department')]
    #[Layout('components.layouts.admin')]
    public function render()
    {
        $query = Department::query();

        // Search filter
        if ($this->searchTerm) {
            $query->where('name', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $this->searchTerm . '%');
        }

        // Status filter
        if ($this->statusFilter !== 'all') {
            $query->where('status', $this->statusFilter === 'active' ? 1 : 0);
        }

        $departments = $query->latest()->paginate($this->perPage);

        return view('livewire.admin.department.all', [
            'departments' => $departments,
        ]);
    }
}