<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidderFinancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidder_finances', function (Blueprint $table) {
            $table->id();
            $table->string('catalogue');
            $table->string('location')->default('ethiopia');
            $table->string('quantity');
            $table->integer('single_price');
            $table->integer('total_price');
            $table->integer('tender_price');
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
        Schema::dropIfExists('bidder_finances');
    }
}
