<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication_plans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('discipline_id')->unsigned();
            $table->foreign('discipline_id')->references('id')->on('disciplines');
            $table->string('name_of_publication');
            $table->unsignedInteger('author_id');
            $table->foreign('author_id')->references('id')->on('users');
            $table->unsignedInteger('paper_size_id');
            $table->foreign('paper_size_id')->references('id')->on('papers_size');
            $table->integer('number_of_pages');
            $table->integer('number_of_copies');
            $table->unsignedInteger('cover_id');
            $table->foreign('cover_id')->references('id')->on('covers');
            $table->unsignedInteger('month_of_submission_id');
            $table->foreign('month_of_submission_id')->references('id')->on('months_of_submission');
            $table->string('phone_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('publication_plans');
    }
}
