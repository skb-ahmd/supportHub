<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketStatusChangeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    public function __construct($ticket)
    {
        $this->ticket = $ticket;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Ticket Status Change Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.ticket_status_change',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
    public function build()
    {
        return $this->view('emails.ticket_status_change')
            ->subject('Your Ticket Status Has Changed')
            ->with([
                'ticket' => $this->ticket,
            ]);
    }
}
