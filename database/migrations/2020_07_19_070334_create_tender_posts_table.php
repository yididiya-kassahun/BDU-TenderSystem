<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenderPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tender_posts', function (Blueprint $table) {
            $table->bigIncrements('tender_id');
            $table->string('purchaser');
            $table->string('purchase_method');
            $table->string('purchase_type');
            $table->string('purchase_id_no');
            $table->string('lot_no');
            $table->longText('content');
            $table->integer('procurement_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('tender_posts');
    }
}
