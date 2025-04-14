<?php

namespace App\Livewire\Admin\Appointment;

use App\Exports\AllAppointmentsExport;
use App\Models\Appointment;
use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\Attributes\On;
use Maatwebsite\Excel\Facades\Excel;

class All extends Component
{
    public $search = '';
    public $startDate = '';
    public $endDate = '';
    public $showToday = true;
    public $openDropdown=false;

    public function mount()
    {
        // Set today's date as default when component loads
        $today = Carbon::today()->format('Y-m-d');
        $this->startDate = $today;
        $this->endDate = $today;
    }
    public function toggleDropdown(){
        
        $this->openDropdown=!$this->openDropdown;
    }
    public function exportPdf()
    {
        $query = Appointment::with('doctor.user', 'patient');

        // Apply the same filters as render
        if ($this->search) {
            $query->where(function ($q) {
                $q->whereHas('doctor.user', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                })
                    ->orWhereHas('patient', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    });
            });
        }

        if ($this->showToday) {
            $today = Carbon::today()->format('Y-m-d');
            $query->where('appointment_date', $today);
        } elseif ($this->startDate && $this->endDate) {
            $query->whereBetween('appointment_date', [$this->startDate, $this->endDate]);
        }

        $appointments = $query->latest()->get();

        $pdf = Pdf::loadView('pdf.appointmentpdf', [
            'appointments' => $appointments
        ])->setPaper('A4', 'portrait');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'appointments.pdf');
    }
    public function export()
    {
        $query = Appointment::with('doctor.user', 'patient');

        // Apply the same filters as in render
        if ($this->search) {
            $query->where(function ($q) {
                $q->whereHas('doctor.user', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                })
                    ->orWhereHas('patient', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    });
            });
        }

        if ($this->showToday) {
            $today = Carbon::today()->format('Y-m-d');
            $query->where('appointment_date', $today);
        } elseif ($this->startDate && $this->endDate) {
            $query->whereBetween('appointment_date', [$this->startDate, $this->endDate]);
        }

        $appointments = $query->latest()->get();

        return Excel::download(new AllAppointmentsExport($appointments), 'appointments.xlsx');
    }

    public function updateStatus($appointmentId, $newStatus)
    {
        $appointment = Appointment::find($appointmentId);

        if ($appointment) {
            $appointment->status = $newStatus;
            $appointment->save();

            $this->dispatch('success', 'Appointment status updated.');
        }
    }

    public function filterByDateRange()
    {
        $this->showToday = false;
    }

    public function showTodayAppointments()
    {
        $today = Carbon::today()->format('Y-m-d');
        $this->startDate = $today;
        $this->endDate = $today;
        $this->showToday = true;
    }

    public function clearDateFilter()
    {
        $this->startDate = '';
        $this->endDate = '';
        $this->showToday = false;
    }


    #[On('refresh-appointment')]
    #[Layout('components.layouts.admin')]
    public function render()
    {
        $query = Appointment::with('doctor.user', 'patient');

        // Apply search filter if provided
        if ($this->search) {
            $query->where(function ($q) {
                $q->whereHas('doctor.user', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%');
                })
                    ->orWhereHas('patient', function ($query) {
                        $query->where('name', 'like', '%' . $this->search . '%');
                    });
            });
        }

        // Apply date filter
        if ($this->showToday) {
            // Today's appointments
            $today = Carbon::today()->format('Y-m-d');
            $query->where('appointment_date', $today);
        } elseif ($this->startDate && $this->endDate) {
            // Date range appointments
            $query->whereBetween('appointment_date', [$this->startDate, $this->endDate]);
        }

        $appointments = $query->latest()->get();

        return view('livewire.admin.appointment.all', [
            'appointments' => $appointments,
        ]);
    }
}
