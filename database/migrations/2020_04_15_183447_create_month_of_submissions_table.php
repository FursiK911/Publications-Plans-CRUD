<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthOfSubmissionsTable extends Migration
{
    public function up()
    {
        Schema::create('month_of_submissions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('month_name');
        });
    }
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('month_of_submissions');
    }
}
