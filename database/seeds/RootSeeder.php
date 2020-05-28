<?php

use Illuminate\Database\Seeder;
use App\User;

class RootSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usr = new User;
        $usr->username = "root";
        $usr->password = \Hash::make("1sampai8");
        $usr->role = "admin";
        $usr->save();
    }
}
