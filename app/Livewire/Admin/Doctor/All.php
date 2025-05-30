<?php

namespace App\Livewire\Admin\Doctor;

use App\Models\Doctor;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $sortField = 'id';
    public $sortDirection = 'desc';

    protected $queryString = ['search'];

    public function updatingSearch() 
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function alertConfirm($id)
    {
        $doctor = Doctor::with('appointments')->find($id);
        
        if ($doctor->appointments->count() > 0) {
            $this->dispatch('error', __('Cannot delete doctor with existing appointments.'));
            return;
        }
        
        $this->dispatch('swal:confirm', type: 'warning', message: 'Are you sure?', text: 'If deleted, you will not be able to recover this', doctorId: $id);
    }

    public function delete($id)
    {
        $doctor = Doctor::with('appointments')->find($id);
        
        if ($doctor->appointments->count() > 0) {
            $this->dispatch('error', __('Cannot delete doctor with existing appointments.'));
            return;
        }
        
        $doctor->delete();
        $this->dispatch('success', __('Doctor deleted successfully.'));
    }

    public function updateStatus($id, $status)
    {
        $doctor = Doctor::find($id);
        $doctor->status = $status;
        $doctor->save();

        $this->dispatch('success', __('Doctor status updated successfully.'));
    }

    #[On('refresh-doctor')]
    #[Layout('components.layouts.admin')]
    public function render()
    {
        $doctors = Doctor::with('user', 'department')
            ->whereHas('user', function ($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.admin.doctor.all', [
            'doctors' => $doctors,
        ]);
    }
}
