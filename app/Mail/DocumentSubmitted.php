<?php

namespace App\Mail;

use App\Models\Document;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Request;

class DocumentSubmitted extends Mailable
{
    use Queueable, SerializesModels;
    private $user;
    private $department;
    private $request;
    private $document;
    /**
     * Create a new message instance.
     */
    public function __construct(User $user, $request, Document $document)
    {
        $this->user = $user;
        $this->request = $request;
        $this->document = $document;

    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Document Submitted',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.document_submitted',
            with: ['document'=>$this->document]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [public_path($this->document->file_path)];
    }
}
