<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    protected $fillable = [
        'vehicle_model_name',
        'price',
        'seating_capacity',
        'transmission',
        'fuel_type',
        'year_of_release',
        'gearbox',
        'mileage',
    ];
    public function reservation()
    {
        return $this->hasOne(Reservation::class, );
    }
}
