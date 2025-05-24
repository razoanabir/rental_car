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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->text('vehicle_model_name');
            $table->text('image');
            $table->text('price');
            $table->text('seating_capacity');
            $table->text('transmission');
            $table->text('fuel_type');
            $table->text('year_of_release');
            $table->text('gearbox');
            $table->text('mileage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
