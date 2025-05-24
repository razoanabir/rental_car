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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('details_about_us');
            $table->text('vission_title');
            $table->text('vission_details');
            $table->text('vission_image');
            $table->text('mission_title');
            $table->text('mission_details');
            $table->text('mission_image');
            $table->text('details_about_support');
            $table->text('experience');
            $table->text('support_1');
            $table->text('support_2');
            $table->text('support_3');
            $table->text('support_4');
            $table->text('owner_image');
            $table->text('owner_name');
            $table->text('owner_designation');
            $table->text('image_1');
            $table->text('image_2');
            $table->text('total_cars');
            $table->text('happy_clients');
            $table->text('car_centers');
            $table->text('total_kilometers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
