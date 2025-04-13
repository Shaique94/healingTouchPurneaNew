<?php

namespace App\Exports;

use App\Models\Appointment;
use Illuminate\Contracts\View\View as ViewView;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class AppointmentExport implements FromView
{
    protected $date;
    public function __construct($date)
    {
        $this->date = $date;
    }
    public function view(): ViewView
    {
        $appointments = Appointment::with(['doctor'])
            ->whereDate('appointment_date', $this->date)
            ->get();
        return view('exports.appointment', [
            'appointments' => $appointments,
        ]);
    }
}
