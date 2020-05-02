<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chair extends Model
{
    public $timestamps = false;
    protected $table = 'chairs';
    protected $fillable = ['name_of_chair'];
}
