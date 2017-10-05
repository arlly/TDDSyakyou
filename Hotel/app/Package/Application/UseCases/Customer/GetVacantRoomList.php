<?php
namespace App\Package\Application\UseCases\Customer;

use App\Package\Domain\Booking\BookingRepositoryInterface;
use App\Package\Domain\Booking\BookingDate;

class GetVacantRoomList
{

    protected $bookingRepo;

    public function __construct(BookingRepositoryInterface $bookingRepo)
    {
        $this->bookingRepo = $bookingRepo;
    }

    public function vacantRoomList(BookingDate $date)
    {
        return $this->bookingRepo->getVacantRooms($date);
    }
}