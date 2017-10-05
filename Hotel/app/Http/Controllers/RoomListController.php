<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package\Application\UseCases\Customer\GetVacantRoomList;
use App\Package\Domain\Booking\BookingDate;
use App\Package\Application\UseCases\Customer\BookingRegistRoomFactory;

class RoomListController extends Controller
{
    //
    protected $factory;

    public function __construct(BookingRegistRoomFactory $factory)
    {
        $this->factory = $factory;
    }

    public function index($date, GetVacantRoomList $usecase)
    {
        $vacantRoom = $usecase->vacantRoomList((new BookingDate($date)));
        
        return view('room.index', [
            'VacantRoom' => $vacantRoom
        ]);
    }

    public function bookingSingleRoom($date, GetVacantRoomList $usecase)
    {
        $Date = new BookingDate($date);
        $vacantRoom = $usecase->vacantRoomList($Date);
        
        if (! $vacantRoom->isSingleRoom()) {
            throw new \Exception('空き部屋がありません！！');
        }
        
        $usecase = $this->factory->factory('single');
        $Room = $usecase->getBookingRoom($vacantRoom);
        $BookingRegistRoomNumber = $usecase->bookingRegistRoom($Date, $Room);
        
        return view('room.bookingRegist', [
            'BookingRegistRoomNumber' => $BookingRegistRoomNumber
        ]);
    }

    public function bookingDoubleRoom($date, GetVacantRoomList $usecase)
    {
        //
        $Date = new BookingDate($date);
        $vacantRoom = $usecase->vacantRoomList($Date);
        
        if (! $vacantRoom->isDoubleRoom()) {
            throw new \Exception('空き部屋がありません！！');
        }
        
        $usecase = $this->factory->factory('double');
        $Room = $usecase->getBookingRoom($vacantRoom);
        $BookingRegistRoomNumber = $usecase->bookingRegistRoom($Date, $Room);
        
        return view('room.bookingRegist', [
            'BookingRegistRoomNumber' => $BookingRegistRoomNumber
        ]);
    }
}
