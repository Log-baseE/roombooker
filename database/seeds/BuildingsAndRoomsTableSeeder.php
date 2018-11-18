<?php

use Illuminate\Database\Seeder;
use roombooker\Building;
use roombooker\Room;
use roombooker\RoomType;
use roombooker\Facility;

class BuildingsAndRoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RoomType::create(['type' => 'classroom']);
        Facility::create(['name' => 'Elevator']);
        Facility::create(['name' => 'Lighting']);
        Facility::create(['name' => 'Air Conditioning']);

        $bs = "ABCDEFG";
        for($i = 0; $i < 7; $i++) {
            Building::create(['name' => $bs[$i]]);
            $b_id = Building::where('name', $bs[$i])->first()->id;
            for($j = 1; $j <= 5; $j++) {
                for($k = 0; $k <= 10; $k++) {
                    $room = new Room;
                    $room->name = $bs[$i].'-'.($j*100 + $k);
                    $room->floor = (string) $j;
                    $room->building_id = $b_id;

                    $room->save();

                    $category = RoomType::find(1);
                    $facilities = Facility::find([1, 2, 3]);
                    $room->types()->attach($category);
                    $room->facilities()->attach($facilities);
                }
            }
        }
    }
}
