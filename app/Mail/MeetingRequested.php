<?php

namespace App\Mail;

use App\Models\Document;
use App\Models\Meeting;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Request;

class MeetingRequested extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    private $department;
    private $request;
    private $meeting;
    /**
     * Create a new message instance.
     */
    public function __construct(User $user, Meeting $meeting)
    {
        $this->user = $user;
        $this->meeting = $meeting;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'eSupervisor Meeting',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.new_meeting',
            with: ['meeting'=>$this->meeting]
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
