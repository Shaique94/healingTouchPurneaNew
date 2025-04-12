<?php

namespace App\Livewire\Admin;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Index extends Component
{
    public $search = '';
    public $statusFilter = '';
    public $doctorFilter = '';
    
    // Add property for initial loading state
    public $isLoading = true;
    
    // Custom event listeners
    protected $listeners = [
        'refresh-dashboard' => '$refresh',
    ];
    
    public function mount()
    {
        // Default to showing all appointments for today
        $this->isLoading = false;
    }
    
    // Filter by status - updated to use status string
    public function filterByStatus($status)
    {
        $this->statusFilter = $status;
    }
    
    // Filter by doctor - updated to use doctor ID
    public function filterByDoctor($doctorId)
    {
        $this->doctorFilter = $doctorId;
    }
    
    // Clear all filters
    public function clearFilters()
    {
        $this->statusFilter = '';
        $this->doctorFilter = '';
        $this->search = '';
    }
    
    #[Layout('components.layouts.admin')]
    public function render()
    {
        // Dashboard stats
        $patients = Patient::count();
        $doctors = Doctor::count();
        $appointments = Appointment::count();
        $revenue = Appointment::with('doctor')->get()->sum(function ($model) {
            return $model->doctor->sum('fee');
        });
            
        // Today's date in Y-m-d format
        $today = Carbon::today()->format('Y-m-d');
        
        // Get today's appointments - updated field name to match your schema
        $todayAppointmentsQuery = Appointment::with('doctor.user', 'patient')
            ->where('appointment_date', $today);
        
        // Apply filters if set
        if ($this->statusFilter) {
            $todayAppointmentsQuery->where('status', $this->statusFilter);
        }
        
        if ($this->doctorFilter) {
            $todayAppointmentsQuery->where('doctor_id', $this->doctorFilter);
        }
        
        if ($this->search) {
            $todayAppointmentsQuery->where(function($query) {
                $query->whereHas('doctor.user', function($q) {
                    $q->where('name', 'like', '%'.$this->search.'%');
                })
                ->orWhereHas('patient', function($q) {
                    $q->where('name', 'like', '%'.$this->search.'%');
                });
            });
        }
        
        $todayAppointments = $todayAppointmentsQuery->latest()->get();
        
        // Get available doctors (those with status = 'active' and have available slots today)
        $availableDoctors = Doctor::with('user')
            ->where('status', '1')
            ->whereDoesntHave('appointments', function($query) use ($today) {
                $query->where('appointment_date', $today)
                    ->whereIn('status', ['confirmed', 'checked_in']);
            })
            ->get();
        
        return view('livewire.admin.index', [
            'Patients' => $patients,
            'Doctors' => $doctors,
            'Appointments' => $appointments,
            'Revenue' => $revenue,
            'allAppointments' => $todayAppointments,
            'availableDoctors' => $availableDoctors,
            'statuses' => ['Pending', 'Confirmed', 'Checked In', 'Completed', 'Cancelled'],
            'doctors' => Doctor::with('user')->get(),
        ]);
    }
}