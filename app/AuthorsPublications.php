<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorsPublications extends Model
{
    protected $table = 'authors_publications';
    protected $fillable = ['author_id', 'plan_id'];
    public $timestamps = false;
}
