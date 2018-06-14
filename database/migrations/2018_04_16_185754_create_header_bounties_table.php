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
            $table->string('test_target');
            $table->string('source_code');
            $table->text('disclosure_description');
            $table->text('scope_description');
            $table->text('exclusion_description');
            $table->text('rewards_description');
            $table->string('rewards_tagline')->default('Exclusive Merchandise'); //used for a company to describe what kind of merchandise they offer.
            $table->boolean('is_paid_reward')->default(false);
            $table->integer('minimum_rewards')->default(0);
            $table->integer('maximum_rewards')->default(0);
            $table->date('up_since')->useCurrent();
            $table->dateTime('deadline');
//            $table->integer('bugs_reported')->default(0);
            $table->boolean('is_running')->default(true);

            $table->foreign('client_id')->references('client_id')->on('clients');
            $table->foreign('category_id')->references('category_id')->on('bounty_categories');
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
