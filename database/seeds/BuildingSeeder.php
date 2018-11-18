<?php

use Illuminate\Database\Seeder;
use roombooker\Building;

class BuildingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buildings = "ABCDEFG";
        for($i = 0; $i < 7; $i++){
            Building::create(['name' => $buildings[$i]]);
        }
    }
}
