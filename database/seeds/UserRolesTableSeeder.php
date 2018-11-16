<?php

use Illuminate\Database\Seeder;
use roombooker\UserRole;

class UserRolesTableSeeder extends Seeder
{
    private static $roles = [
        'user',
        'admin',
        'authority',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$roles as $role) {
            UserRole::create(['name' => $role]);
        }
    }
}
