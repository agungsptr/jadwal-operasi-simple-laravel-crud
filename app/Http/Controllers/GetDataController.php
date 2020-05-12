<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalOperasi;

class GetDataController extends Controller
{
    public function dataJadwal()
    {
        $jp = JadwalOperasi::all();

        $list = [];
        $x=0;
        $a=0;
        $length = count($jp);

        for ($i=1; $i < $length+1; $i++) {
            $ten[$a] = $jp[$i-1];
            $a++;

            if ($i % 5 == 0){
                $list[$x]=$ten;
                $x++;
                $a = 0;
                $ten = null;
            }

            if ($i < $length+1) {
                $list[$x]=$ten;
            }
        }

        // return count($list);
        return $list;
    }
}
