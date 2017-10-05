<?php
namespace App\Package\Domain\Booking;

use App\Package\Domain\Models\Entity\EntityCollectionInterface;
use App\Package\Domain\Models\Entity\EntityInterface;
use App\Package\Domain\Room\RoomNumber;

class VacantRooms implements EntityCollectionInterface
{

    protected $vacantRoomElements;

    public function __construct()
    {
        //
    }

    public function add(EntityInterface $element)
    {
        if (! $element instanceof VacantRoomElements) {
            throw new \Exception("Instance Error");
        }

        $this->vacantRoomElements[] = $element;
        return $this;
    }

    public function get()
    {
        return $this->vacantRoomElements;
    }

    public function remove(EntityInterface $element)
    {
        //
    }

    //ダブルの部屋取得
    public function getDoubleRoomList()
    {
    	$doubleRoomList = array();

    	if ($this->vacantRoomElements) {
    		foreach ($this->vacantRoomElements as $element) {
    			if ($element->getRoomType() == 'double') {
    				$doubleRoomList[] = $element;
    			}
    		}
    	}

    	return $doubleRoomList;
    }

    //シングルの部屋取得
    public function getSingleRoomList()
    {
    	$singleRoomList = array();

    	if ($this->vacantRoomElements) {
    		foreach ($this->vacantRoomElements as $element) {
    			if ($element->getRoomType() == 'single') {
    				$singleRoomList[] = $element;
    			}
    		}
    	}

    	return $singleRoomList;

    }

    //ダブルの部屋の空きがあるか？
    public function isDoubleRoom()
    {
    	if ($this->vacantRoomElements) {
    		foreach ($this->vacantRoomElements as $element) {
    			if ($element->getRoomType() == 'double') {
    				return true;
    			}
    		}
    	}
    	return false;

    }

    //シングルの部屋の空きがあるか？
    public function isSingleRoom()
    {
    	if ($this->vacantRoomElements) {
    		foreach ($this->vacantRoomElements as $element) {
    			if ($element->getRoomType() == 'single') {
    				return true;
    			}
    		}
    	}
    	return false;
    }

    //対応する部屋が空いているかどうか？？
    public function isVacantRoomNumber(RoomNumber $roomNumber)
    {
    	if ($this->vacantRoomElements) {
    		foreach ($this->vacantRoomElements as $element) {
    			if ($element->getRoomNumber() == $roomNumber->getRoomNumber()) {
    				return true;
    			}
    		}
    	}
    	return false;
    }


}