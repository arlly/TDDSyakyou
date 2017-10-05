<?php

namespace App\Package\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Model;

class EloquentBooking extends Model
{
    //
    protected $table = 'bookings';
    
    protected $fillable = [
        'booking_date',
        'room_id'
    ];
}
