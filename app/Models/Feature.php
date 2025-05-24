<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    //Represents-the-table-name-for-this-application.
    protected $fillable = [
        'title',
        'details',
        
    ];

}
