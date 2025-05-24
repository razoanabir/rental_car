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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->text('pick_up_location');
            $table->text('drop_off_location');
            $table->text('pick_up_time');
            $table->text('drop_off_time');
            $table->text('pick_up_date');
            $table->text('drop_off_date');
            $table->text('car_id');
            $table->text('extra_facility_id')->nullable();
            $table->text('name');
            $table->text('age');
            $table->text('phone_number');
            $table->text('reservation_status');
            $table->text('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
