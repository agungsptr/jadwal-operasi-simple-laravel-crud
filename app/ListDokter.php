<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListDokter extends Model
{
    protected $table = "list_dokter";
    protected $fillable = ['nama'];
    public $timestamps = false;
}
