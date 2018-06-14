<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHuntersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Hunters', function (Blueprint $table) {
            $table->increments('hunter_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('username');
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->date('birthday');
            $table->string('address')->nullable();
            $table->string('TIN')->nullable();
            $table->bigInteger('balance')->default(0);
            $table->smallInteger('tier')->default(0); //0 is not eligible for paid reward, 1 otherwise
            $table->float('performance_rate')->default(0.0);
            $table->bigInteger('points')->default(0);
            $table->string('profile_image')->default('images/hunter/hunter_profile_image.png');
            $table->timestamp('join_at')->useCurrent();
            $table->rememberToken();
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
        Schema::dropIfExists('Hunters');
    }
}
