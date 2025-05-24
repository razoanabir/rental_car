<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //Represents-the-table-name-for-this-application.
    protected $fillable = [
        'name',
        'designation',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'linked_in_link',
    ];
}
