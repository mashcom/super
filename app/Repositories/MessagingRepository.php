<?php

namespace App\Repositories;

use App\Models\Conversation;
use App\Models\Document;
use App\Models\Message;
use App\Models\User;
use App\Repositories\Document as DocumentStruct;
use Illuminate\Database\Eloquent\Model;

class MessagingRepository
{

    public function get_conversation($student_id, $supervisor_id)
    {
        $conversation = Conversation::where("student_id", $student_id)
            ->where("supervisor_id", $supervisor_id)
            ->first();
        if (!$conversation) {
            $conversation = new Conversation();
            $conversation->student_id = $student_id;
            $conversation->supervisor_id = $supervisor_id;
            $conversation->save();
        }

        return $conversation;
    }

    public function get_conversation_by_id($id)
    {
        return Conversation::with("messages")
            ->with("messages.document")
            ->with("messages.sender")
            ->with("messages.meeting")
            ->findOrFail($id);
    }

    public function create_message($sender_id, $conversation_id, $message_body)
    {

        if($message_body=="")$message_body = "No additional details";
        $message = new Message();
        $message->conversation_id = $conversation_id;
        $message->sender_id = $sender_id;
        $message->message = $message_body;
        $message->save();
        return $message;
    }

    public function attach_document(DocumentStruct $document_struct)
    {
        $document = new Document();
        $document->message_id = $document_struct->message_id;
        $document->file_name = $document_struct->filename;
        $document->description = $document_struct->description;
        $document->document_type = $document_struct->document_type;
        $document->file_type = $document_struct->file_type;
        $document->file_path = $document_struct->file_path;
        $document->save();

        return $document;
    }

    public function upload_file($file): string
    {
        $destinationPath = 'uploads/'; // upload directory
        $filename = $file->getClientOriginalName(); // get the original file name
        $extension = $file->getClientOriginalExtension(); // get the file extension
        $newFilename = time() . '.' . $extension; // create a new file name

        // Upload the file
        $file->move($destinationPath, $newFilename);

        // Return the file path
        return $destinationPath . $newFilename;
    }
}