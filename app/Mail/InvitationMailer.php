<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvitationMailer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $invitation;
    public function __construct($invitation)
    {
        //
        $this->invitation = $invitation;
    }

    public function build()
    {
        $acceptUrl = route('invitations.accept', $this->invitation->id);
        $rejectUrl = route('invitations.reject', $this->invitation->id);

        return $this->subject('You are invited to join a team')
        ->view('emails.team-invitation', compact('acceptUrl', 'rejectUrl'));
    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invitation Mailer',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'Tasks.invitationMail',
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
