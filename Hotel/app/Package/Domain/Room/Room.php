<?php
namespace App\Package\Domain\Room;

interface Room
{
    public function setId(int $id);
    
    public function setFloor(Floor $floor);
    
    public function setCharge(Charge $charge);
    
    public function setRoomNumber(RoomNumber $roomNumber);
    
    public function getId();
    
    public function getFloor(): Floor;
    
    public function getCharge(): Charge;
    
    public function getRoomNumber(): RoomNumber;
    
}