<?php
namespace Tests\Domain;

use Tests\TestCase;
use App\Package\Domain\Room\Room;
use App\Package\Domain\Room\SingleRoom;
use App\Package\Domain\Room\Charge;
use App\Package\Domain\Room\RoomNumber;
use App\Package\Domain\Room\Floor;
use Illuminate\Foundation\Testing\Concerns\MocksApplicationServices as Mockery;
use Illuminate\Support\Facades\Cache;

class RoomDomainTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();
    }

    public function testRoom()
    {
        $roomNumber = 402;
        $charge = 5980;
        $floor = 4;
        
        $Room = (new SingleRoom())->setCharge(new Charge($charge))
            ->setFloor(new Floor($floor))
            ->setRoomNumber(new RoomNumber($roomNumber));
        ;
        
        $this->assertEquals($roomNumber, $Room->getRoomNumber()->getRoomNumber());
        $this->assertEquals($charge, $Room->getCharge()->getCharge());
        $this->assertEquals($floor, $Room->getFloor()->getFloor());
    }

    public function tearDown()
    {
        parent::tearDown();
        // Mockery::close();
    }
}