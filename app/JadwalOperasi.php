<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JadwalOperasi extends Model
{
    protected $table = "JadwalOperasi";
    protected $fillable = ['pasien', 'dokter', 'tindakan', 'status', 'jam_keluar'];
}
