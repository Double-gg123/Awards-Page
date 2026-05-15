<?php
namespace App\Mail;

use App\Models\Nomination;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NominationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Nomination $nomination) {}

    public function envelope(): Envelope {
        return new Envelope(subject: 'Your Nomination Was Received!');
    }

    public function content(): Content {
        return new Content(view: 'emails.nomination-confirmation');
    }
}