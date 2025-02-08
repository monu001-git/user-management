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
        Schema::create('team_statics', function (Blueprint $table) {
            $table->id();
            $table->string('number',255)->nullable();
            $table->string('text',255)->nullable(); 
            $table->foreignId('team_id')->constrained()->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_statics');
    }
};
