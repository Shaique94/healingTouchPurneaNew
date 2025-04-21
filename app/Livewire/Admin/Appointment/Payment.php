<?php

namespace App\Livewire\Admin\Appointment;

use App\Models\Appointment;
use App\Models\Payment as ModelsPayment;
use Livewire\Attributes\On;
use Livewire\Component;

class Payment extends Component
{
    public $appointment_id;
    public $mode = 'cash';
    public $paid_amount;
    public $settlement = false;
    public $status;
    public $ToggleModal = false;
    public $total_amount;
    public $appointment;
    public $payment;  

    public function rules() {
        return [
            'appointment_id' => 'required|exists:appointments,id',
            'mode'           => 'nullable|string|max:255',
            'paid_amount'    => 'required|numeric|min:0',
            'settlement'     => 'boolean',
            'status'         => 'required|in:due,paid',
        ];
    }

    #[On('open-payment')]
    public function edit($id) {
        $this->openModal();

        $this->appointment = Appointment::findOrFail($id);
        $this->total_amount = $this->appointment->doctor->fee;
        $this->appointment_id = $id;

        $this->payment = ModelsPayment::where('appointment_id', $id)->first();

        if ($this->payment) {
            $this->mode = $this->payment->mode;
            $this->paid_amount = $this->payment->paid_amount;
            $this->settlement = $this->payment->settlement;
            $this->status = $this->payment->status;
        } else {
            $this->mode = 'cash';
            $this->paid_amount = 0;
            $this->settlement = false;
            $this->status = 'due';
        }
    }

    public function openModal() {
        $this->ToggleModal = true;
    }

    public function closeModal() {
        $this->dispatch('refresh-appointment');
        $this->ToggleModal = false;
    }

    public function save() {
        $this->validate();

            // Create or update logic
            ModelsPayment::updateOrCreate(
                ['appointment_id' => $this->appointment_id],
                [
                    'mode'        => $this->mode,
                    'paid_amount' => $this->paid_amount,
                    'settlement'  => $this->settlement,
                    'status'      => $this->status,
                ]
            );

            // Update appointment status to checked_in
            $this->appointment->status = 'checked_in';
            $this->appointment->save();

            $this->dispatch('refresh-appointment');
            $this->closeModal();
            $this->dispatch('success', __('Payment added or updated successfully'));
            $this->reset();
       
    }

    public function updatedPaidAmount($value) {
        if ($value >= $this->total_amount) {
            $this->settlement = true;
            $this->status = 'paid';
        } else {
            $this->settlement = false;
            $this->status = 'due';
        }
    }

    public function render() {
        return view('livewire.admin.appointment.payment');
    }
}
