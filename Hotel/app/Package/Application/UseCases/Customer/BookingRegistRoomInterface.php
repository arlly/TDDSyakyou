<?php
namespace App\Package\Application\UseCases\Customer;

use App\Package\Domain\Models\Entity\EntityCollectionInterface;
use App\Package\Domain\Booking\BookingDate;
use App\Package\Domain\Room\Room;
use App\Package\Domain\Room\RoomNumber;

interface BookingRegistRoomInterface
{

    /**
     * 予約可能な部屋のナンバーを取得する
     */
    public function getBookingRoom(EntityCollectionInterface $collection): Room;

    /**
     * 実際に予約して部屋のIDを返す
     */
    public function bookingRegistRoom(BookingDate $date, Room $room);
}