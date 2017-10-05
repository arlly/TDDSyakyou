<?php
namespace App\Package\Domain\Booking;

use App\Package\Domain\Room\Room;
use App\Package\Domain\Room\RoomNumber;
interface BookingRepositoryInterface
{

    /**
     * 予約登録をする
     * @param BookingDate $date
     * @param Room $room
     */
    public function registBookingRoom(BookingDate $date, Room $room): RoomNumber;
    
    /**
     * 空き部屋リストを取得する
     * @param BookingDate $date
     */
    public function getVacantRooms(BookingDate $date) :VacantRooms;


}


