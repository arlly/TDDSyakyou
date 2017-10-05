<?php

namespace App\Package\Infrastructure\Eloquents;

use Illuminate\Database\Eloquent\Model;

class EloquentRoom extends Model
{
    //
    protected $table = 'rooms';
    
    protected $fillable = [
        'room_number',
        'floor',
        'type',
        'charge',
    ];
}
