<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
        'pick_up_location',
        'drop_off_location',
        'pick_up_time',
        'drop_off_time',
        'pick_up_date',
        'drop_off_date',
        'car_id',
        'extra_facility_id',
        'name',
        'age',
        'phone_number',
        'email',
    ];
    public function cars()
    {
        return $this->belongsTo(Cars::class, 'car_id');
    }    
    public function extraFacility()
    {
        return $this->belongsTo(ExtraFacility::class, 'extra_facility_id');
    } 
}
