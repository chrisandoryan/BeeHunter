<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBountyTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bounty_targets', function (Blueprint $table) {
            $table->increments('target_id');
            $table->integer('bounty_id')->unsigned();
            $table->string('target_string');
            $table->timestamps();
            $table->foreign('bounty_id')->references('bounty_id')->on('header_bounties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bounty_targets');
    }
}
