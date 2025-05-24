<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    protected $fillable = [
        'main_address',
        'mail_id',
        'website_link',
        'facebook_link',
        'twitter_link',
        'instagram_link',
        'linked_in_link',
        'google_map',
        'contact_number'
    ];
}
