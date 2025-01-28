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
            $table->string('name',150); 
            $table->string('url')->nullable()->default(null); 
            $table->integer('content_id')->nullable()->default(1); 
            $table->string('menu_place')->nullable(); 
            $table->string('link_type')->nullable();
            $table->string('slug')->nullable();
            $table->integer('order')->nullable()->default(0);
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('parent_id')->nullable(); 
            $table->softDeletes();
            $table->timestamps(); 
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
