<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FlightDetails extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'flight_id';


    public function flight(): BelongsTo
    {
        return $this->belongsTo(Flight::class);
    }

}
