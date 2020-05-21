<?php

use App\JadwalOperasi;
use App\ListDokter;
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
            $jo = new ListDokter;
            $jo->nama = "dok$i";
            $jo->save();
        }
    }
}
