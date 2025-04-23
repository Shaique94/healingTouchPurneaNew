<?php

namespace App\Livewire\Admin\Appointment;

use App\Models\Appointment;
use App\Models\Doctor;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Milon\Barcode\Facades\DNS1DFacade as DNS1D;

class Update extends Component
{
    public $name;
    public $email;
    public $phone;
    public $gender;
    public $address;
    public $pincode;
    public $city;
    public $state = "Bihar";
    public $country = "India";

    public $doctor_id;
    public $appointment_date;
    public $appointment_time;
    public $payment_method = "cash";
    public $notes;
    public $doctors;
    public $appointment_id;
    public $age;
    public function mount($id){
        $this->doctors=Doctor::all();
        $appointment=Appointment::findOrFail($id);
        $this->appointment_id = $appointment->id;
        $this->name = $appointment->patient->name;
        $this->email = $appointment->patient->email;
        $this->phone = $appointment->patient->phone;
        $this->gender = $appointment->patient->gender;
        $this->age = $appointment->patient->age;
        $this->address = $appointment->patient->address;
        $this->pincode = $appointment->patient->pincode;
        $this->city = $appointment->patient->city;
        $this->state = $appointment->patient->state ?? 'Bihar';
        $this->country = $appointment->patient->country ?? 'India';

        $this->doctor_id = $appointment->doctor_id;
        $this->appointment_date = $appointment->appointment_date;
        $this->appointment_time = $appointment->appointment_time;
        $this->payment_method = $appointment->payment_method;
        $this->notes = $appointment->notes;
    }
    public function update()
    {

        $this->validate([
            'name'              => 'required|string|max:255',
            'email'             => 'nullable|email|max:255',
            'phone'             => 'required|string|max:20',
            'gender'            => 'nullable|in:male,female,other',
            'age'               => 'nullable|integer|min:0|max:150',
            'address'           => 'nullable|string|max:500',
            'pincode'           => 'nullable|digits:6',
            'city'              => 'nullable|string|max:100',
            'state'             => 'nullable|string|max:100',
            'country'           => 'nullable|string|max:100',
            'doctor_id'         => 'required|exists:doctors,id',
            'appointment_date'  => 'required|date|after_or_equal:today',
            'appointment_time'  => 'required',
            'payment_method'    => 'nullable|string',
            'notes'             => 'nullable|string|max:500',

        ]);

        $appointment = Appointment::findOrFail($this->appointment_id);

        // Update Patient
        $patient = $appointment->patient;
        $patient->name = $this->name;
        $patient->email = $this->email;
        $patient->phone = $this->phone;
        $patient->gender = $this->gender;
        $patient->age = $this->age;
        $patient->address = $this->address;
        $patient->pincode = $this->pincode;
        $patient->city = $this->city;
        $patient->state = $this->state;
        $patient->country = $this->country;
        $patient->save();

        $formattedTime = $this->convertTimeFormat($this->appointment_time);

        $appointment->doctor_id = $this->doctor_id;
        $appointment->appointment_date = $this->appointment_date;
        $appointment->appointment_time = $formattedTime;
        $appointment->payment_method = $this->payment_method;
        $appointment->notes = $this->notes;
        $appointment->save();

        // Regenerate appointment number and barcode
        $datePrefix = Carbon::parse($this->appointment_date)->format('Ymd');
        $appointmentNo = intval($datePrefix . str_pad($appointment->id, 4, '0', STR_PAD_LEFT));
        $appointment->appointment_no = $appointmentNo;

        try {
            // Generate new barcode
            $barcodeFileName = 'barcode-appointment-' . $appointment->id . '.png';
            $barcodePath = 'appointments/barcodes/' . $barcodeFileName;
            
            $barcodeString = (string) $appointmentNo;
            $barcodeImage = DNS1D::getBarcodePNG($barcodeString, 'C128', 2, 60);
            
            if ($barcodeImage && is_string($barcodeImage)) {
                // Delete old barcode if exists
                if ($appointment->barcode_path) {
                    Storage::disk('public')->delete($appointment->barcode_path);
                }
                
                Storage::disk('public')->put($barcodePath, base64_decode($barcodeImage));
                $appointment->barcode_path = $barcodePath;
            }
        } catch (\Exception $e) {
            \Log::error('Barcode generation failed: ' . $e->getMessage());
        }

        $appointment->save();

        $this->dispatch('refresh-appointment');
        $this->dispatch('success', __('Appointment Updated successfully'));   
        $this->redirect('/admin/appointment', navigate: true);

    }
    private function convertTimeFormat($timeString)
    {
        try {
            // Parse the time string using Carbon
            $time = Carbon::createFromFormat('h:i A', $timeString);
            // Return the formatted time in 24-hour format without seconds
            return $time->format('H:i:00');
        } catch (\Exception $e) {
            // If parsing fails, try to work with the time as is
            return $timeString;
        }
    }
    public function resetForm()
    {
        $this->name = '';
        $this->email = '';
        $this->phone = '';
        $this->gender = '';
        $this->age = '';
        $this->address = '';
        $this->pincode = '';
        $this->city = '';
        $this->state = 'Bihar';
        $this->country = 'India';
        $this->doctor_id = '';
        $this->appointment_date = '';
        $this->appointment_time = '';
        $this->notes = '';
    }
    #[Layout('components.layouts.admin')]
    public function render()
    {
        return view('livewire.admin.appointment.update');
    }
}
