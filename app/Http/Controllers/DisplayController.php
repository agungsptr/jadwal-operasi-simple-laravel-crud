<?php

namespace App\Http\Controllers;

use App\JadwalOperasi;
use Carbon\CarbonTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DisplayController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Makassar');
        $jp = JadwalOperasi::whereDate('jam_masuk', Carbon::today())
            ->orderBy('jam_masuk', 'ASC')
            ->get();

        $list = [];
        $ten = [];
        $length = count($jp);

        for ($i = 1; $i < $length + 1; $i++) {
            array_push($ten, $jp[$i - 1]);

            if ($i % 10 == 0) {
                array_push($list, $ten);
                $ten = [];
            }

            if ($i == $length && !empty($ten)) {
                array_push($list, $ten);
            }
        }

        return view('jadwal_operasi.index', [
            'list' => $list,
        ]);
    }
}
