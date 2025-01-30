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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->text('descriptions')->nullable();
            $table->text('descriptions2')->nullable();
            $table->text('descriptions3')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->string('image', 255)->nullable();
            $table->string('image2', 255)->nullable();
            $table->string('banner', 255)->nullable();
            $table->boolean('status')->default(0);
            $table->string('team')->nullable()->default('off');
            $table->string('certificate')->nullable()->nullable()->default('off');
            $table->string('image_content')->nullable()->default('off');
            $table->string('faq')->nullable()->default('off');
            $table->string('left_right')->nullable()->default('off');
            $table->string('right_left')->nullable()->default('off');
            $table->string('center_content')->nullable()->default('off');
            $table->string('count')->nullable()->default('off');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
