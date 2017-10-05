<?php
namespace App\Package\Application\UseCases\Customer;

use App\Package\Domain\Booking\BookingDate;
use App\Package\Domain\Room\Room;
use App\Package\Domain\Booking\BookingRepositoryInterface;
use App\Package\Domain\Room\RoomNumber;
use App\Package\Domain\Models\Entity\EntityCollectionInterface;
use App\Package\Domain\Room\RoomRepositoryInterface;

class BookingRegistSingleRoom implements BookingRegistRoomInterface
{
    protected $bookingRepo;
    protected $roomRepo;
    public function __construct(BookingRepositoryInterface $bookingRepo, 
                                RoomRepositoryInterface $roomRepo)
    {
        $this->bookingRepo = $bookingRepo;
        $this->roomRepo = $roomRepo;
    }

    public function getBookingRoom(EntityCollectionInterface $collection): Room
    {
        foreach ($collection->get() as $element) {
            if ($element->getRoomType() == 'single') {
                return $this->roomRepo->getRoom(new RoomNumber($element->getRoomNumber()));
            }
        }
        
        return false;
    }

    public function bookingRegistRoom(BookingDate $date, Room $room): RoomNumber
    {
        return $this->bookingRepo->registBookingRoom($date, $room);
    }
}