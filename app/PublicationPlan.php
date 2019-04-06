<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PublicationPlan extends Model
{
    protected $table = 'publication_plans';
    protected $fillable = ['discipline_id, type_publication_id, name_of_publication, author_id, paper_size_id, number_of_pages,
     number_of_copies, cover_id, month_of_submission_id, phone_number'];

    public function latestPlan()
    {
        return $this->hasOne(\App\PublicationPlan::class)->latest();
    }
}