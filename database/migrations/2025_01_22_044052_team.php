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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->string('qualification', 255)->nullable();
            $table->string('slug', 255)->nullable();
            $table->string('department_name', 255)->nullable();
            $table->integer('department')->nullable()->default(0);
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->string('experience',255)->nullable();
            $table->string('designation',255)->nullable();
            $table->integer('order')->nullable()->default(0);
            $table->boolean('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
