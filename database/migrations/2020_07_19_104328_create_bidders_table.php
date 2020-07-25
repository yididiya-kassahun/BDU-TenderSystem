<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiddersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('bidders', function (Blueprint $table) {
        //     $table->bigIncrements('id');
        //     $table->string('first_name');
        //     $table->string('last_name');
        //     $table->string('email')->unique();
        //     $table->string('company_name');
        //     $table->integer('tin_number');
        //     $table->integer('phone_number');
        //     $table->string('password');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bidders');
    }
}
