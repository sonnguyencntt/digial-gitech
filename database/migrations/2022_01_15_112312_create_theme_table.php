<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThemeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('themes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('logo')->nullable();
            $table->string('address')->nullable();
            $table->string('hotline')->nullable();
            $table->string('email')->nullable();
            $table->string('id_zalo')->nullable();
            $table->string('id_facebook')->nullable();
            $table->string('id_youtube')->nullable();
            $table->string('domain')->nullable();
            $table->string('iframe_position')->nullable();
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
        Schema::dropIfExists('theme');
    }
}
