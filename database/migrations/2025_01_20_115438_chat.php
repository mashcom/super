<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Create table for chat conversations
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id');
            $table->integer('supervisor_id');
            $table->timestamps();
        });

        // Create table for chat messages
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->integer('conversation_id');
            $table->integer('sender_id');
            $table->text('message');
            $table->timestamps();
        });

        // Create table for documents
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->integer('message_id');
            $table->string('file_name');
            $table->string('description');
            $table->integer('accepted')->default(0);
            $table->string('comment')->nullable();
            $table->string('document_type');
            $table->string('file_type');
            $table->string('file_path');
            $table->timestamps();
        });

      
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
        Schema::dropIfExists('messages');
        Schema::dropIfExists('conversations');
    }
};
