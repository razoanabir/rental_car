<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
        'title',
        'details_about_us',
        'vission_title',
        'vission_details',
        'mission_title',
        'mission_details', 
        'details_about_support',
        'experience',
        'support_1',
        'support_2',
        'support_3',
        'support_4',
        'owner_name',
        'owner_designation',
        'total_cars',
        'happy_clients',
        'car_centers',
        'total_kilometers',
    ];
}
