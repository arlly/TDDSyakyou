<?php
namespace App\Package\Domain\Booking;

class BookingDate
{

    private $value;

    public function __construct($value)
    {
        if (! strptime($value, '%Y-%m-%d')) {
            throw new \Exception('exception!');
        }

        $this->value = $value;
    }

    public function getBookingDate()
    {
        return $this->value;
    }
}