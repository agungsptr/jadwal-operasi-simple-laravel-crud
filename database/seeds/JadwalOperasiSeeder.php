<?php

use App\JadwalOperasi;
use App\ListDokter;
use App\User;
use Illuminate\Database\Seeder;

class JadwalOperasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($i=0; $i < 15; $i++) { 
        //     $jo = new ListDokter;
        //     $jo->nama = "dok$i";
        //     $jo->save();
        // }

        $usr = new User;
        $usr->name = "yuda";
        $usr->password = \Hash::make("1234567890");
        $usr->save();
    }
}
