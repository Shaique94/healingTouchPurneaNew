<?php

namespace App\Livewire\Admin\Qualification;

use App\Models\Qualification;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class All extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $perPage = 10;

    public function alertConfirm($id)
    {
        $this->dispatch('swal:confirm', [
            'type' => 'warning',
            'message' => 'Are you sure?',
            'text' => 'If deleted, you will not be able to recover.',
            'qualId' => $id
        ]);
    }
    
    public function delete($id)
    {
        Qualification::find($id)->delete();
        $this->dispatch('success', __('Qualification deleted successfully.'));
        $this->dispatch('refresh-qualification'); // Fixed from 'refresh-department'
    }

    #[On('refresh-qualification')]
    #[Layout('components.layouts.admin')]
    public function render()
    {
        $query = Qualification::query();

        // Search filter
        if ($this->searchTerm) {
            $query->where('name', 'like', '%' . $this->searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $this->searchTerm . '%');
        }

        $qualifications = $query->latest()->paginate($this->perPage);

        return view('livewire.admin.qualification.all', [
            'qualifications' => $qualifications,
        ]);
    }
}