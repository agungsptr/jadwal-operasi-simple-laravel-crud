<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListStatus extends Model
{
    protected $table = "list_status";
    protected $fillable = ['status'];
    public $timestamps = false;
}
