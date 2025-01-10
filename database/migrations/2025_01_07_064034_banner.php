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
        Schema::create('banners', function (Blueprint $table) {
            $table->id(); 
            $table->string('title'); 
            $table->text('description')->nullable();
            $table->string('image'); 
            $table->string('url')->nullable();
            $table->string('external')->nullable(); 
            $table->integer('order')->nullable(); 
            $table->boolean('status')->default(true); 
            $table->softDeletes();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
