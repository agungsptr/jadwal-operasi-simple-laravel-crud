<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListTindakan extends Model
{
    protected $table = "list_tindakan";
    protected $fillable = ['tindakan'];
    public $timestamps = false;
}
