<?php

namespace App\Mail;

use App\Models\Document;
use App\Models\DocumentAcceptance;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DocumentStatusUpdate extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $department;
    private $request;
    private $document;
    private $documentAcceptance;
    /**
     * Create a new message instance.
     */
    public function __construct(User $user, Document $document, DocumentAcceptance $documentAcceptance)
    {
        $this->user = $user;

        $this->document = $document;
        $this->documentAcceptance = $documentAcceptance;

    }


    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Submission Status Updated',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.document_status',
            with: ['document' => $this->document, 'acceptance' => $this->documentAcceptance]
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
