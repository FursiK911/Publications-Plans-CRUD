<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersAuthors extends Model
{
    protected $table = 'users_authors';
    protected $fillable = ['author_id', 'user_id'];
    public $timestamps = false;
}
