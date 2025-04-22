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
    public $showToday = false;
    public $showTomorrow = false;
    public $openDropdown = false;

    public function mount()
    {
        $this->applyToday(); // Default show today's appointments
    }

    public function applyToday()
    {
        $this->clearDateFilters();
        $this->showToday = true;
    }

    public function applyTomorrow()
    {
        $this->clearDateFilters();
        $this->showTomorrow = true;
    }

    public function clearDateFilters()
    {
        $this->startDate = '';
        $this->endDate = '';
        $this->showToday = false;
        $this->showTomorrow = false;
        $this->dispatch('dateFiltersCleared');
    }
    public function printPdf($id)
    {
        $appointment = Appointment::with(['doctor.user', 'doctor.department', 'patient'])
            ->where('id', $id)
            ->first();

        $pdf = Pdf::loadView('pdf.appointment', compact('appointment'))
        ->setPaper('a4');
            

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->output();
        }, 'appointment-' . $appointment->id . '.pdf');
    }


    public function toggleDropdown()
    {
        $this->openDropdown = !$this->openDropdown;
    }

    public function exportPdf()
    {
        $appointments = $this->buildQuery()->latest()->get();

        $pdf = Pdf::loadView('pdf.appointmentpdf', [
            'appointments' => $appointments
        ])->setPaper('A4', 'portrait');

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'appointments.pdf');
    }

    public function export()
    {
        $appointments = $this->buildQuery()->latest()->get();

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

    #[On('refresh-appointment')]
    #[Layout('components.layouts.admin')]
    public function render()
    {
        $appointments = $this->buildQuery()->latest()->get();

        return view('livewire.admin.appointment.all', [
            'appointments' => $appointments
        ]);
    }

    private function buildQuery()
    {
        $query = Appointment::with('doctor.user', 'patient');

        if ($this->showTomorrow) {
            $tomorrow = Carbon::tomorrow()->toDateString();
            $query->whereDate('appointment_date', $tomorrow);
        } elseif ($this->showToday) {
            $today = Carbon::today()->toDateString();
            $query->whereDate('appointment_date', $today);
        } elseif ($this->startDate && $this->endDate) {
            $query->whereDate('appointment_date', '>=', $this->startDate)
                  ->whereDate('appointment_date', '<=', $this->endDate);
        }

        if ($this->search) {
            $query->where(function ($q) {
                $q->whereHas('doctor.user', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                          ->orWhere('email', 'like', '%' . $this->search . '%');
                })->orWhereHas('patient', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                });
            });
        }

        return $query;
    }
}
