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
        Schema::create('menus', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->string('url')->nullable(); 
            $table->unsignedBigInteger('parent_id')->nullable(); 
            $table->integer('order')->default(0); 
            $table->boolean('status')->default(true);
            $table->string('external')->nullable();
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