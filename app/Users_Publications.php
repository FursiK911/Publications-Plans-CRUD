<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users_Publications extends Model
{
    protected $table = 'users_publications';
    public $timestamps = false;
    protected $fillable = ['user_id, plan_id'];
}
