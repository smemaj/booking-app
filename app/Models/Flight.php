<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function flightDetails()
    {
        return $this->hasOne(FlightDetails::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
