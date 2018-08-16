<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rewardments', function (Blueprint $table) {
            $table->increments('rewardment_id');
            $table->integer('submission_id')->unsigned();
            $table->bigInteger('amount');
            $table->integer('validated')->default(0);
            $table->timestamps();

            $table->foreign('submission_id')->references('submission_id')->on('submissions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_transactions');
    }
}
