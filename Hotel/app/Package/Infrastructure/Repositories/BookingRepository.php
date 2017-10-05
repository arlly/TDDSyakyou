<?php
namespace App\Package\Infrastructure\Repositories;

use App\Package\Domain\Booking\BookingRepositoryInterface;
use App\Package\Infrastructure\Eloquents\EloquentBooking;
use App\Package\Domain\Booking\BookingDate;
use App\Package\Domain\Room\Room;
use App\Package\Domain\Room\RoomNumber;
use App\Package\Domain\Booking\VacantRooms;
use App\Package\Infrastructure\Eloquents\EloquentRoom;
use App\Package\Domain\Booking\VacantRoomElements;

class BookingRepository implements BookingRepositoryInterface
{

    protected $eloquentBooking;

    protected $eloquentRoom;

    public function __construct(EloquentBooking $eloquentBooking, EloquentRoom $eloquentRoom)
    {
        $this->eloquentBooking = $eloquentBooking;
        $this->eloquentRoom = $eloquentRoom;
    }

    public function registBookingRoom(BookingDate $date, Room $room): RoomNumber
    {
        //
        $data = [
            'booking_date' => $date->getBookingDate(),
            'room_id' => $room->getId()
        ];
        
        $this->eloquentBooking->create($data);
        
        return $room->getRoomNumber();
    }

    public function getVacantRooms(BookingDate $date): VacantRooms
    {
        $Collection = new VacantRooms();
        
        $Rooms = $this->eloquentRoom->whereNotIn('id', $this->eloquentBooking->select('room_id')
            ->where('booking_date', $date->getBookingDate()))
            ->get();
        
        foreach ($Rooms as $room) {
            $element = (new VacantRoomElements())
                           ->setId($room->id)
                           ->setRoomNumber($room->room_number)
                           ->setRoomType($room->type);

            $Collection->add($element);
        }

        return $Collection;

    }
}