<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCamerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cameras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('image_url');
            $table->string('discount')->nullable();
            $table->string("price");
            $table->string('color')->nullable();
            $table->string('storage')->nullable();
            $table->string("resolution")->nullable();
            $table->string("connection")->nullable();
            $table->string("noise_reduction_in_low_light")->nullable();
            $table->string("balance_white_light")->nullable();
            $table->string("water_resistant")->nullable();
            $table->string("insurance")->nullable();
            $table->string("customer_care")->nullable();
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
        Schema::dropIfExists('cameras');
    }
}
