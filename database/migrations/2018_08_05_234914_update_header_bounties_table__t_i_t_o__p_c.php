<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateHeaderBountiesTableTITOPC extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('header_bounties', function (Blueprint $table) {
            // $table->integer('reward_id')->unsigned()->default(2);
            // $table->renameColumn('minimum_rewards', 'minimum_reward');
            // $table->renameColumn('maximum_rewards', 'maximum_reward');
            $table->foreign('reward_id')->references('reward_id')->on('reward_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
