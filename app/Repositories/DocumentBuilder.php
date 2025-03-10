<?php

namespace App\Repositories;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;


class DocumentBuilder
{
    private $document;

    public function __construct()
    {
        $this->document = new Document();
    }

    public function withMessageId($id)
    {
        $this->document->message_id = $id;
        return $this;
    }

    public function withFilename($filename)
    {
        $this->document->filename = $filename;
        return $this;
    }

    public function withDescription($description)
    {
        if ($description == "")
            $description = "No descriptiion provided";
        $this->document->description = $description;
        return $this;
    }

    public function withDocumentType($document_type)
    {
        $this->document->document_type = $document_type;
        return $this;
    }

    public function withFileType($file_type)
    {
        $this->document->file_type = $file_type;
        return $this;
    }

    public function withFilePath($file_path)
    {
        $this->document->file_path = $file_path;
        return $this;
    }

    public function build()
    {
        return $this->document;
    }
}