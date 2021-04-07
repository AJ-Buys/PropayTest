<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    //Run the migrations.
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('Client');
            $table->string('Name');
            $table->string('Surname');
            $table->string('ID');
            $table->string('Mobile_no');
            $table->string('Email');
            $table->date('Birth_date');
            $table->string('Language');
            $table->string('Interests');
            $table->timestamps();
        });
    }

    //Reverse the migrations.
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
