<?php
namespace App\Package\Domain\Room;

class DoubleRoom implements Room
{

    protected $id;

    protected $floor;

    protected $charge;

    protected $roomNumber;

    public function setId(int $id)
    {
        $this->id = $id;
        return $this;
    }

    public function setFloor(Floor $floor)
    {
        $this->floor = $floor;
        return $this;
    }

    public function setCharge(Charge $charge)
    {
        $this->charge = $charge;
        return $this;
    }

    public function setRoomNumber(RoomNumber $roomNumber)
    {
        $this->roomNumber = $roomNumber;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getFloor(): Floor
    {
        return $this->floor;
    }

    public function getCharge(): Charge
    {
        return $this->charge;
    }

    public function getRoomNumber(): RoomNumber
    {
        return $this->roomNumber;
    }
}