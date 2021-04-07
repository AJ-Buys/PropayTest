<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToClients extends Migration
{
    //Run the migrations.
    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->integer('user_id');
        });
    }

    //Reverse the migrations.
    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->dropColumn('user_id');
        });
    }
}