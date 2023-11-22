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
        Schema::create('emergency_email_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emergency_email_id')->nullable();  // Add emergency_email_id
            $table->string('email');
            $table->timestamps();

            // Add foreign key constraint 
            $table->foreign('emergency_email_id')->references('id')->on('emergency_emails');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergency_email_infos');
    }
};
