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
        Schema::create('gallery_entries', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->text('image')->nullable(); 
            $table->text('file')->nullable(); 
            $table->foreignId('gallery_id')->constrained()->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_entries');
    }
};
