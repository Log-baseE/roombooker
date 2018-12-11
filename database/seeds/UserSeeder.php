<?php

use Illuminate\Database\Seeder;
use roombooker\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $uu = new User;
        $uu->name = 'User';
        $uu->email = 'user@user.com';
        $uu->password = Hash::make('asdfasdf');
        $uu->save();

        $adm = new User;
        $adm->name = 'Admin';
        $adm->email = 'admin@admin.com';
        $adm->password = Hash::make('asdfasdf');
        $adm->role_id = 100;
        $adm->save();

        $au = new User;
        $au->name = 'Auth';
        $au->email = 'auth@auth.com';
        $au->password = Hash::make('asdfasdf');
        $au->role_id = 10;
        $au->save();
    }
}
