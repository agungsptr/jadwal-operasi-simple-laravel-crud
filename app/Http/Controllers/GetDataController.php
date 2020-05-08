<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JadwalOperasi;

class GetDataController extends Controller
{
    public function dataJadwal()
    {
        $jp = JadwalOperasi::paginate(10)->toJson();
        return $jp;
    }
}
