<?php

namespace App\Mail;

use App\Models\Department;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class RoleAllocated extends Mailable
{
    use Queueable, SerializesModels;

    private $user;
    private $department;
    private $role;
    /**
     * Create a new message instance.
     */
    public function __construct(User $user, Department $department,string $role)
    {
        $this->user = $user;
        $this->department = $department;
        $this->role = $role;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Role Allocation',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.new_role',
            with:['user'=>$this->user,'department'=>$this->department,'role'=>$this->role]
        
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
