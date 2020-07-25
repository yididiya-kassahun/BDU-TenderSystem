<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidderFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidder_files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('buisness_license');
            $table->longText('licence_certificate');
            $table->longText('tax_certificate');
            $table->longText('bid_bond_guarantee');
            $table->longText('buisness_reg_certificate');
            $table->longText('tax_duty_impose');
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
        Schema::dropIfExists('bidder_files');
    }
}
