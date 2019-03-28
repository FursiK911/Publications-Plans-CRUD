<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    public $timestamps = false;
    protected $table = 'disciplines';
    protected $fillable = ['name_of_discipline'];
}
