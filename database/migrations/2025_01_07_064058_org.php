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
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->string('phone', 100)->nullable();
            $table->string('header_logo', 255)->nullable();
            $table->string('header_logo_title', 255)->nullable();
            $table->string('footer_logo', 255)->nullable();
            $table->string('footer_logo_title', 255)->nullable();
            $table->string('favicon', 255)->nullable();
            $table->string('favicon_title', 255)->nullable();
            $table->text('address')->nullable();
            $table->text('about')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();

            $table->string('number_count1',255)->nullable();
            $table->string('number_count2', 255)->nullable();
            $table->string('number_count3', 255)->nullable();
            $table->string('number_count4', 255)->nullable();
            $table->string('unit_count1', 255)->nullable();
            $table->string('unit_count2', 255)->nullable();
            $table->string('unit_count3', 255)->nullable();
            $table->string('unit_count4', 255)->nullable();
            $table->string('text_count1', 255)->nullable();
            $table->string('text_count2', 255)->nullable();
            $table->string('text_count3', 255)->nullable();
            $table->string('text_count4', 255)->nullable();
            $table->string('count_heading', 255)->nullable();
            $table->string('count_phone', 255)->nullable();


            $table->string('specialities_title', 255)->nullable();
            $table->text('specialities_heading',255)->nullable();
            $table->text('specialities_description1')->nullable();
            $table->text('specialities_description2')->nullable();
            $table->string('specialities_phone', 255)->nullable();


            $table->string('team_title', 255)->nullable();
            $table->string('team_heading', 255)->nullable();
            $table->text('team_description1')->nullable();
            $table->text('team_description2')->nullable();
            $table->string('team_phone', 255)->nullable();

            $table->string('news_title', 255)->nullable();
            $table->string('news_heading', 255)->nullable();
            $table->text('news_description')->nullable();


        //socal media
            $table->string('instagram', 255)->nullable();
            $table->string('instagram_title', 255)->nullable();
            $table->string('facebook', 255)->nullable();
            $table->string('facebook_title', 255)->nullable();
          
            $table->string('youtube', 255)->nullable();
            $table->string('youtube_title', 255)->nullable();
          

            $table->text('some_point')->nullable();
            $table->string('middle_image', 255)->nullable();

            $table->string('map', 500)->nullable();
            $table->string('whatsApp', 500)->nullable();

        // Testimonial
            $table->string('testimonial_title', 255)->nullable();
            $table->string('testimonial_number', 255)->nullable();
            $table->string('testimonial_heading', 255)->nullable();

        //report download    
           $table->string('report_download', 255)->nullable();

           $table->text('body_script')->nullable();
           $table->text('head_script')->nullable();

           $table->string('common_banner',255)->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orgs');
    }
};
