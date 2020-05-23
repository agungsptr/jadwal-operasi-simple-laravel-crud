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

        // $usr = new User;
        // $usr->username = "agung";
        // $usr->password = \Hash::make("1234567890");
        // $usr->save();

        for ($i=0; $i < 20; $i++) { 
            $jo = new JadwalOperasi;
            $j =$i+1;
            $jo->pasien = "pasien $j";
            $jo->dokter = "dokter $j";
            $jo->tindakan = "tindakan $j";
            $jo->status = "status $j";
            $jo->save();
        }
    }
}
