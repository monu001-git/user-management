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
        Schema::create('appointment_books', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email',255)->unique();
            $table->string('doctor_email',255)->nullable();
            $table->string('phone',100)->nullable();
            $table->string('age',255)->nullable();
            $table->string('gender',255)->nullable();
            $table->string('department',255)->nullable();
            $table->string('doctor',255)->nullable();
            $table->text('date')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointment_books');
    }
};
