<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('regnum')->unique('regnum');
            $table->enum('sex', ['Male','Female']);
            $table->string('surname');
            $table->string('firstname');
            $table->string('programme');
            $table->integer('academic_year');
            $table->integer('semester');
            $table->string('on_wrl');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
