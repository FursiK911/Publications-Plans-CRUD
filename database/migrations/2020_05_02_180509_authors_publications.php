<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AuthorsPublications extends Migration
{
    public function up()
    {
        Schema::create('authors_publications', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedInteger('author_id');
            $table->foreign('author_id')->references('id')->on('authors');
            $table->unsignedInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('publications');
            $table->primary(array('author_id', 'plan_id'));
        });
    }
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('authors_publications');
    }
}
