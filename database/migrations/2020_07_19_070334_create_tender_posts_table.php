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
            $table->longText('content');
            // $table->integer('user_id');
             // $table->bigInteger('org_id')->unsigned();
            // $table->foreign('org_id')->references('org_id')->on('organisations')->onDelete('cascade');
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
