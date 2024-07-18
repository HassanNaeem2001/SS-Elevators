<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendUpdateEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    public $ottp;
    /**
     * Create a new message instance.
     */
    public function __construct($ottp)
    {
        
        $this->ottp = $ottp;
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
       
        return new Envelope(
            subject: 'Reset your Password for S.S. Elevators',
           
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'updateemail',
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
}
