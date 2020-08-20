<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidderInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidder_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('agent_name');
            $table->string('citizenship');
            $table->string('company_email')->unique();
            $table->integer('company_ph');
            $table->integer('tin_number');
            $table->integer('tax_id_num');
            $table->integer('trade_license_reg_num');
            $table->string('company_logo_url');
            $table->integer('bidder_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bidder_infos');
    }
}
