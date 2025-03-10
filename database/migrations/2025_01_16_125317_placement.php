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
        Schema::create('placements', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('student_id');
            $table->string('name');
            $table->string('country');
            $table->string('city');
            $table->string('physical_address');
            $table->string('telephone');
            $table->string('email');
            $table->string('website')->nullable(true);
            $table->date('date_of_engagement');
            $table->date('on_wrl');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('placements');
    }
};
