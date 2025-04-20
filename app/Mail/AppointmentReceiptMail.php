<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class AppointmentReceiptMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;
    public $pdf;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data, $pdf)
    {
        $this->data = $data;
        $this->pdf = $pdf;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Tomorrow\'s Appointment Details - ' . $this->data['doctor_name'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.receipt', // Ensure this view matches your needs
            with: $this->data
        );
    }

    /**
     * Get the attachments for the message.
     */
    public function attachments(): array
    {
        return [
            Attachment::fromData(
                fn () => $this->pdf->output(),
                'tomorrow_appointments.pdf'
            )->withMime('application/pdf'),
        ];
    }
}
