<?php
namespace App\Package\Infrastructure\Repositories;

use App\Package\Domain\Room\RoomRepositoryInterface;
use App\Package\Infrastructure\Eloquents\EloquentRoom;
use App\Package\Domain\Room\RoomNumber;
use App\Package\Domain\Room\Room;
use App\Package\Domain\Room\Floor;
use App\Package\Domain\Room\Charge;
use App\Package\Domain\Room\DoubleRoom;
use App\Package\Domain\Room\SingleRoom;

class RoomRepository implements RoomRepositoryInterface
{

    protected $eloquent;

    public function __construct(EloquentRoom $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function getRoom(RoomNumber $number): Room
    {
        $row = $this->eloquent->where('room_number', $number->getRoomNumber())->first();
        
        if ($row->type  == 'single') { 
           $Room = new SingleRoom(); 
        } else {
            $Room = new DoubleRoom();
        }
        
        return $Room->setId($row->id)
                    ->setFloor(new Floor($row->floor))
                    ->setCharge(new Charge($row->charge))
                    ->setRoomNumber(new RoomNumber($row->room_number));
    }
    
    
    public function findRoom(int $id)
    {
        return $this->eloquent->find($id);
    }
    
}