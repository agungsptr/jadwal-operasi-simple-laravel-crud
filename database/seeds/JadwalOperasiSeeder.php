<?php

use App\ListDokter;
use App\ListTindakan;
use App\ListStatus;
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
        $dokter = [
            "dr. Agus Thoriq, Sp.OG",
            "dr. I Made Putra Juliawan, Sp.OG",
            "dr. Rusiyanti, Sp.OG",
            "dr. Adib Ahmad Shammakh, Sp.OG",
            "dr. Windiana Rambu, M.Kes., Sp.OG",
            "dr. Ahmad Fadhli Busthomi, M. Biomed, Sp.OG",
            "dr. Muhammad Rizkinov Jumsa, M.Kes, Sp.OG",
            "dr. Sugianto Prajitno, Sp.BA",
            "dr. Mochammad Alfian Sulaksana, Sp.THT-KL",
        ];

        $tindakan = [
            "Operasi Sesar",
            "Operasi Sesar + MOW",
            "Kuret",
            "Laparatomi",
            "Miomektomy",
            "Salpingektomy",
            "Histerektomy",
            "Sirkumsisi",
            "Tonsilektomi",
        ];

        $status = [
            "Persiapan",
            "Operasi Berlangsung",
            "Di Ruang Pemulihan",
            "Di Ruang Inap",
        ];

        foreach ($dokter as $dok) {
            $dokter = new ListDokter;
            $dokter->nama = $dok;
            $dokter->save();
        }

        foreach ($tindakan as $tindak) {
            $tindakan = new ListTindakan;
            $tindakan->tindakan = $tindak;
            $tindakan->save();
        }

        foreach ($status as $sts) {
            $status = new ListStatus;
            $status->status = $sts;
            $status->save();
        }
    }
}
