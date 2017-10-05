<?php
namespace App\Package\Domain\Room;

interface RoomRepositoryInterface
{

    /**
     * 取得
     * 
     * @param
     *            $id
     * @return mixed
     */
    public function getRoom(RoomNumber $number): Room;


}


