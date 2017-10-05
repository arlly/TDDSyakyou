<?php
namespace App\Package\Domain\Booking;

use App\Package\Domain\Models\Entity\EntityInterface;

class VacantRoomElements implements EntityInterface
{

    protected $id;

    protected $roomNumber;
    
    protected $roomType;

    public function __construct()
    {
        //
    }

    public function setId(int $value)
    {
        $this->id = $value;
        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setRoomNumber(int $value)
    {
        $this->roomNumber = $value;
        return $this;
    }

    public function getRoomNumber()
    {
        return $this->roomNumber;
    }
    
    public function setRoomType($value)
    {
        $this->roomType = $value;
        return $this;
    }
    
    public function getRoomType()
    {
        return $this->roomType;
    }
}