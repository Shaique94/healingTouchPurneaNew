<?php

namespace App\Livewire\Admin;

use App\Exports\AppointmentExport;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class Dashboard extends Component
{
    use WithPagination;
    
    public $perPage = 10;
    public $hideRevenue = false;
    public function exportCsv()
    {
        $today = Carbon::today()->format('Y-m-d');
        return Excel::download(new AppointmentExport($today), 'appointments_' . $today . '.csv', \Maatwebsite\Excel\Excel::CSV);       
    }
    public function showRevenue(){

        $this->hideRevenue = !$this->hideRevenue;
    }
        public function printPdf($id)
    {
        try {
            $appointment = Appointment::with(['doctor', 'patient'])
                ->where('id', $id)
                ->firstOrFail();

            $pdf = Pdf::loadView('pdf.appointment', compact('appointment'))
                    ->setPaper('a4');

            return response()->streamDownload(function () use ($pdf) {
                echo $pdf->output();
            }, 'appointment-receipt.pdf');

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            \Log::error('Appointment not found: ' . $id);
            session()->flash('error', 'Appointment not found.');
            return null;
        } catch (\Exception $e) {
            \Log::error('PDF generation failed: ' . $e->getMessage());
            session()->flash('error', 'Failed to generate PDF. Please try again.');
            return null;
        }
    }

    #[Layout('components.layouts.admin')]
    public function render()
    {
         // Dashboard stats
         $patients = Patient::count();
         $doctors = Doctor::count();
         $appointments = Appointment::count();
         $revenue = Appointment::with('payment')->get()->sum(function($payment) {
             return $payment?->payment?->sum('paid_amount');
         });
 
         // Today's date
         $today = Carbon::today()->format('Y-m-d');
 
         // Today's appointments
         $todayAppointments = Appointment::with(['doctor.user', 'patient'])
             ->where('appointment_date', $today)
             ->latest()
             ->paginate($this->perPage);
 
         // Available doctors
         $availableDoctors = Doctor::with('user')
             ->where('status', '1')
             ->whereDoesntHave('appointments', fn($query) => $query->where('appointment_date', $today)
                 ->whereIn('status', ['Confirmed', 'Checked In']))
             ->get();
 
         // Upcoming appointments
         $upcomingAppointments = Appointment::with(['doctor.user', 'patient'])
             ->where('appointment_date', '>', $today)
             ->orderBy('appointment_date')
             ->take(5)
             ->get();
 
         // Recent activities (mock data)
         $recentActivities = [
             ['action' => 'New appointment created', 'time' => Carbon::now()->subMinutes(15)],
             ['action' => 'Patient registered', 'time' => Carbon::now()->subHours(1)],
             ['action' => 'Appointment status changed to Confirmed', 'time' => Carbon::now()->subHours(2)],
             ['action' => 'Doctor added', 'time' => Carbon::now()->subHours(5)],
             ['action' => 'Payment processed', 'time' => Carbon::now()->subHours(8)],
         ];
 
         // Patient demographics
         $demographics = [
             'Male' => Patient::where('gender', 'male')->count(),
             'Female' => Patient::where('gender', 'female')->count(),
             'Other' => Patient::whereNotIn('gender', ['male', 'female'])->count(),
         ];
 
         // Notifications (corrected and dynamic)
         $pendingAppointment = Appointment::where('status', 'Pending')->count();
         $checkedAppointment = Appointment::where('status', 'Checked In')->count();
         $confirmAppointment = Appointment::where('status', 'Confirmed')->count();
         $cancelledAppointment = Appointment::where('status', 'Cancelled')->count(); // Fixed from 'confirmed'
 
         $notifications = [
             ['message' => $pendingAppointment . ' appointment' . ($pendingAppointment !== 1 ? 's' : '') . ' pending approval', 'type' => 'warning'],
             ['message' => $checkedAppointment . ' appointment' . ($checkedAppointment !== 1 ? 's' : '') . ' checked in', 'type' => 'info'],
             ['message' => $confirmAppointment . ' appointment' . ($confirmAppointment !== 1 ? 's' : '') . ' confirmed', 'type' => 'primary'],
             ['message' => $cancelledAppointment . ' appointment' . ($cancelledAppointment !== 1 ? 's' : '') . ' cancelled', 'type' => 'danger'],
         ];
         // Filter out notifications with zero counts
         $notifications = array_filter($notifications, fn($n) => (int) str_replace([' appointments', ' appointment', ' confirmed', ' checked in', ' cancelled', ' pending approval'], '', $n['message']) > 0);
 
         // Status counts
         $statusCounts = Appointment::where('appointment_date', $today)
             ->select('status')
             ->groupBy('status')
             ->get()
             ->pluck('status')
             ->countBy();
 
        return view('livewire.admin.dashboard',[
            'Patients' => $patients,
            'Doctors' => $doctors,
            'Appointments' => $appointments,
            'Revenue' => number_format($revenue, 2),
            'allAppointments' => $todayAppointments,
            'availableDoctors' => $availableDoctors,
            'upcomingAppointments' => $upcomingAppointments,
            'recentActivities' => $recentActivities,
            'demographics' => $demographics,
            'notifications' => $notifications,
            'statuses' => ['Pending', 'Confirmed', 'Checked In', 'Completed', 'Cancelled'],
            'statusCounts' => $statusCounts,
            'doctors' => Doctor::with('user')->get(),
        ]);
    }
}
