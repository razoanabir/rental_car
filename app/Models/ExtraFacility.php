<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExtraFacility extends Model
{
    protected $fillable = [
        'title',
        'details',
        'cost',
    ];
    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }
}
