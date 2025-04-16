<?php

namespace App\Livewire\Admin\Career;

use Livewire\Component;
use App\Models\Career;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

#[Layout('components.layouts.admin')]
class AddCareer extends Component
{
    use WithPagination;

    public $title, $description, $salary, $location, $status = true, $careerId;
    public $showModal = false;
    public $perPage = 10;

    public function mount()
    {
        $this->resetPage();
    }

    public function openModal()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'salary' => 'nullable|string|max:100',
            'location' => 'required|string|max:255',
            'status' => 'required|boolean',
        ]);

        Career::updateOrCreate(
            ['id' => $this->careerId],
            [
                'title' => $this->title,
                'description' => $this->description,
                'salary' => $this->salary,
                'location' => $this->location,
                'status' => $this->status,
            ]
        );

        $this->closeModal();
        $this->dispatch('refresh-careers');
        $this->dispatch('success', __($this->careerId ? 'Career updated successfully' : 'Career created successfully'));
    }

    public function edit($id)
    {
        $career = Career::findOrFail($id);
        $this->careerId = $id;
        $this->title = $career->title;
        $this->description = $career->description;
        $this->salary = $career->salary;
        $this->location = $career->location;
        $this->status = $career->status;
        $this->showModal = true;
    }

    public function delete($id)
    {
        try {
            Career::findOrFail($id)->delete();
            $this->dispatch('refresh-careers');
            $this->dispatch('success', __('Career deleted successfully'));
        } catch (\Exception $e) {
            Log::error('Error deleting career: ' . $e->getMessage());
            $this->dispatch('error', __('An error occurred while deleting the career'));
        }
    }

    public function toggleStatus($id)
    {
        try {
            $career = Career::findOrFail($id);
            $career->status = !$career->status;
            $career->save();
            $this->dispatch('refresh-careers');
            $this->dispatch('success', __('Status updated successfully'));
        } catch (\Exception $e) {
            Log::error('Error toggling career status: ' . $e->getMessage());
            $this->dispatch('error', __('An error occurred while updating the status'));
        }
    }

    public function resetForm()
    {
        $this->reset([
            'careerId',
            'title',
            'description',
            'salary',
            'location',
            'status',
        ]);
        $this->status = true;
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.admin.career.add-career', [
            'careers' => Career::orderBy('status', 'desc')->paginate($this->perPage),
        ]);
    }
}