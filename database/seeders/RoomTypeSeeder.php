<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomType::truncate();
        $roomType = [
            [
                'name' => 'Standard Room',
                'price' => '200000',
                'facilities' => 'AC, TV',
                'information' => 'Usually, this type of room is priced relatively cheaply. The facilities offered are also standard, such as a king-size bed or two queen-size beds. However, the offers given depend on each hotel. The standard room of a 1-star and 5-star hotel is certainly different.',
                'foto' => 'standard-room.jpg',
            ],
            [
                'name' => 'Superior Room',
                'price' => '300000',
                'facilities' => 'AC, TV, Kulkas',
                'information' => 'Basically, a superior room is a slightly better room type than a standard room type. The difference can be in the facilities provided, the interior of the room, or the view from the room.',
                'foto' => 'superior-room.jpg',
            ],
            [
                'name' => 'Deluxe Room',
                'price' => '400000',
                'facilities' => 'AC, TV, Kulkas, Wi-fi',
                'information' => 'Above the superior room type is the deluxe room. This room certainly has a larger room. There are choices of beds that you can choose, double bed or twin bed. Usually, in terms of interior, this room looks more luxurious.',
                'foto' => 'deluxe-room.jpg',
            ],
        ];

        foreach ($roomType as $key => $value){
            RoomType::create($value);
        }
    }
}
