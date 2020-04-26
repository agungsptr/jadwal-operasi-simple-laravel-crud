<?php

use App\JadwalOperasi;
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
        for ($i=0; $i < 15; $i++) { 
            $jo = new JadwalOperasi;
            $jo->pasien = "pasien$i";
            $jo->dokter = "dokter$i";
            $jo->tindakan = "tindakan$i";
            $jo->status = "stts$i";
            $jo->save();
        }
    }
}
