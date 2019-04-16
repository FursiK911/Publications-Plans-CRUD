<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersPublications extends Model
{
    protected $table = 'users_publications';
    public $timestamps = false;
    protected $fillable = ['user_id, plan_id'];
}