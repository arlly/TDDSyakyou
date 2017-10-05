<?php
use Illuminate\Database\Seeder;
use App\package\Infrastructure\Eloquents\EloquentRoom;

class RoomsTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        EloquentRoom::create([
            'room_number' => '101',
            'floor' => '1',
            'type' => 'single',
            'charge' => '5000'
        ]);
        
        EloquentRoom::create([
            'room_number' => '102',
            'floor' => '1',
            'type' => 'single',
            'charge' => '5000'
        ]);
        
        EloquentRoom::create([
            'room_number' => '103',
            'floor' => '1',
            'type' => 'single',
            'charge' => '5000'
        ]);
        
        EloquentRoom::create([
            'room_number' => '201',
            'floor' => '2',
            'type' => 'single',
            'charge' => '5000'
        ]);
        
        EloquentRoom::create([
            'room_number' => '202',
            'floor' => '2',
            'type' => 'single',
            'charge' => '5000'
        ]);
        
        EloquentRoom::create([
            'room_number' => '203',
            'floor' => '2',
            'type' => 'single',
            'charge' => '5000'
        ]);
        
        EloquentRoom::create([
            'room_number' => '301',
            'floor' => '3',
            'type' => 'double',
            'charge' => '10000'
        ]);
        
        EloquentRoom::create([
            'room_number' => '302',
            'floor' => '3',
            'type' => 'double',
            'charge' => '10000'
        ]);
        
        EloquentRoom::create([
            'room_number' => '303',
            'floor' => '3',
            'type' => 'double',
            'charge' => '10000'
        ]);
        
        EloquentRoom::create([
            'room_number' => '401',
            'floor' => '4',
            'type' => 'double',
            'charge' => '10000'
        ]);
        
        EloquentRoom::create([
            'room_number' => '402',
            'floor' => '4',
            'type' => 'double',
            'charge' => '10000'
        ]);
        
        EloquentRoom::create([
            'room_number' => '403',
            'floor' => '4',
            'type' => 'double',
            'charge' => '10000'
        ]);
    }
}
