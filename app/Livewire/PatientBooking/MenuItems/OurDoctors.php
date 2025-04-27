<?php

namespace App\Livewire\PatientBooking\MenuItems;

use App\Models\Doctor;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\Attributes\Title;
use Carbon\Carbon;
use App\Models\Setting;
#[Title('Doctors')]
class OurDoctors extends Component
{
    public $search = '';

    #[Layout('layouts.guest')]
    public function render()
    {
        $doctors = Doctor::with('user', 'department')
        ->whereIn('status', ['1', '2'])
            ->when($this->search, function ($query) {
                return $query->whereHas('user', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('department', function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhere('qualification', 'like', '%' . $this->search . '%');
            })
            ->get()
            ->map(function ($doctor) {
                $availableDays = is_array($doctor->available_days)
                    ? $doctor->available_days
                    : (is_string($doctor->available_days)
                        ? explode(', ', $doctor->available_days)
                        : []);

                $isAvailableToday = in_array(Carbon::now()->format('l'), $availableDays);

                $doctor->isAvailableToday = $isAvailableToday;
                return $doctor;
            });

        return view('livewire.patient-booking.menu-items.our-doctors', compact('doctors'));
    }
    public function bookAppointment($doctorId)
    {
        return redirect()->route('appointments.create', ['doctor_id' => $doctorId]);
    }
}
