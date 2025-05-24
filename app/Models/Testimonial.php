<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    //Represents-the-table-name-for-this-application.
    protected $fillable = [
        'name',
        'profession',
        'star',
        'review',        
    ];
}
