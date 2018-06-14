<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('client_id');
            $table->string('name');
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('address');
            $table->string('phone');
            $table->string('company_description')->nullable();
            $table->bigInteger('balance')->default(0);
            $table->float('credibility_rate')->default(0.0);
            $table->string('image_profile')->default('images/client/client_profile_logo.png');
            $table->timestamp('join_at')->useCurrent();
            $table->boolean('is_verified')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
