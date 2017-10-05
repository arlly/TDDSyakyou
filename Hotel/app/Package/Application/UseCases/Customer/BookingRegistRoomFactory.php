<?php
namespace App\Package\Application\UseCases\Customer;

class BookingRegistRoomFactory
{
    public function factory($env)
    {
        switch($env)
        {
            case('single'):
                return \App::make(BookingRegistSingleRoom::class);
                break;
                
            case('double'):
                return \App::make(BookingRegistDoubleRoom::class);
                break;
                
            default:
                throw new \Exception('BAD ENV!');
        }
    }
}