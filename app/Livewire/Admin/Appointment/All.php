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
    public $openDropdown = false;
    public $showTomorrow = false;

    public function mount()
    {
        $this->showTodayAppointments(); // Set today as default when component loads
    }

    public function toggleDropdown()
    {
        $this->openDropdown = !$this->openDropdown;
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

        if ($this->showTomorrow) {
            $tomorrow = Carbon::tomorrow()->format('Y-m-d');
            $query->where('appointment_date', $tomorrow);
        } elseif ($this->showToday) {
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

        if ($this->showTomorrow) {
            $tomorrow = Carbon::tomorrow()->format('Y-m-d');
            $query->where('appointment_date', $tomorrow);
        } elseif ($this->showToday) {
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
        if (!$this->startDate || !$this->endDate) {
            $this->showTodayAppointments(); // Fallback to today if no date range
            return;
        }
        $this->showToday = false;
        $this->showTomorrow = false;
    }

    public function showTomorrowAppointments()
    {
        $tomorrow = Carbon::tomorrow()->format('Y-m-d');
        $this->startDate = $tomorrow;
        $this->endDate = $tomorrow;
        $this->showToday = false;
        $this->showTomorrow = true;
    }

    public function showTodayAppointments()
    {
        $today = Carbon::today()->format('Y-m-d');
        $this->startDate = $today;
        $this->endDate = $today;
        $this->showToday = true;
        $this->showTomorrow = false;
    }

    public function clearDateFilter()
    {
        $this->showTodayAppointments(); // Reset to today instead of clearing
    }

    #[On('refresh-appointment')]
    #[Layout('components.layouts.admin')]
    public function render()
    {
        $query = Appointment::with('doctor.user', 'patient');

        // Always filter by date
        if ($this->showTomorrow) {
            $tomorrow = Carbon::tomorrow()->format('Y-m-d');
            $query->where('appointment_date', $tomorrow);
        } elseif ($this->showToday || (!$this->startDate && !$this->endDate)) {
            $today = Carbon::today()->format('Y-m-d');
            $query->where('appointment_date', $today);
        } elseif ($this->startDate && $this->endDate) {
            $query->whereBetween('appointment_date', [$this->startDate, $this->endDate]);
        }

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

        $appointments = $query->latest()->get();

        return view('livewire.admin.appointment.all', [
            'appointments' => $appointments,
        ]);
    }
}
