<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Imports extends Migration
{
    public function up()
    {
        Schema::create('imports', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('entity_id');
            $table->integer('date_information');
            $table->integer('debtor_id');
            $table->integer('situation');
            $table->integer('debt');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('imports');
    }
}
