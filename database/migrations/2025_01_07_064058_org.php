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
        Schema::create('orgs', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); 
            $table->string('email')->unique(); 
            $table->string('phone')->nullable(); 
            $table->string('logo')->nullable(); 
            $table->string('logo_title')->nullable();
            $table->string('instagram')->nullable(); 
            $table->string('instagram_title')->nullable(); 
            $table->string('facebook')->nullable(); 
            $table->string('facebook_title')->nullable();
            $table->string('twitter')->nullable(); 
            $table->string('twitter_title')->nullable();
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
