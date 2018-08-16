<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->increments('submission_id');
            $table->integer('bounty_id')->unsigned();
            $table->integer('hunter_id')->unsigned();
            $table->string('title');
            $table->text('description');
            $table->float('vulnerability_score');
            $table->string('stored_report_path');
            $table->timestamp('submitted_datetime')->useCurrent();
            $table->float('client_reliability_point')->default(3.0); //1-5 from worst to best
            $table->float('hunter_performance_point')->default(3.0); //1-5 from worst to best
            //$table->float('payment_id')->nullable();
            //$table->bigInteger('reward_amount')->nullable(); //moved to payment transaction table
            $table->integer('submission_status')->unsigned()->default(1);
            $table->string('hash');

            $table->foreign('bounty_id')->references('bounty_id')->on('header_bounties');
            $table->foreign('hunter_id')->references('hunter_id')->on('hunters');
            $table->foreign('submission_status')->references('status_id')->on('submission_statuses');
            //$table->foreign('payment_id')->references('payment_id')->on('rewardments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submissions');
    }
}
