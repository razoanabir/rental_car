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
        Schema::create('personal_information', function (Blueprint $table) {
            $table->id();
            $table->text('main_address');
            $table->text('mail_id');
            $table->text('website_link');
            $table->text('facebook_link');
            $table->text('twitter_link');
            $table->text('instagram_link');
            $table->text('linked_in_link');
            $table->text('google_map');
            $table->text('contact_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_information');
    }
};
