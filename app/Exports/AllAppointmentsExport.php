<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class AllAppointmentsExport implements FromCollection
{
    protected $appointments;

    public function __construct($appointments)
    {
        $this->appointments = $appointments;
    }

    public function collection()
    {
        return $this->appointments->map(function ($appointment) {
            return [
                'patient_id' => $appointment->patient_id,
                'appointment_id' => $appointment->id,
                'Doctor'    => $appointment->doctor->user->name ?? 'N/A',
                'Patient'   => $appointment->patient->name ?? 'N/A',
                'Date'      => \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y'),
                'Time'      => \Carbon\Carbon::parse($appointment->time)->format('h:i A'),
                'Status'    => ucfirst(str_replace('_', ' ', $appointment->status)),
            ];
        });
    }
}
