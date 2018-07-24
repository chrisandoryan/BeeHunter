<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHeaderBountiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('header_bounties', function (Blueprint $table) {
            $table->increments('bounty_id');
            $table->integer('client_id')->unsigned();
            $table->string('category_id', 10);
            $table->string('title');
            // $table->string('source_code');
            // $table->text('disclosure_description');
            $table->text('scope_description');
            // $table->text('exclusion_description');
            // $table->text('rewards_description');
            // $table->string('rewards_tagline')->default('Exclusive Merchandise'); //used for a company to describe what kind of merchandise they offer.
            $table->integer('reward_id')->unsigned()->default(2);
            $table->integer('minimum_reward')->default(0);
            $table->integer('maximum_reward')->default(0);
            $table->date('up_since');
            $table->string('hash');
            // $table->dateTime('deadline');
            // $table->integer('bugs_reported')->default(0);
            $table->boolean('is_running')->default(false);

            $table->foreign('client_id')->references('client_id')->on('clients');
            $table->foreign('category_id')->references('category_id')->on('bounty_categories');
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
        Schema::dropIfExists('header_bounties');
    }
}
