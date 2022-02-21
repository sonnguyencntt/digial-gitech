<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumCheckZaloFbYbTheme extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('themes', function (Blueprint $table) {
            $table->integer('icon_zalo')->nullable()->after("id_zalo");

            $table->integer('icon_fb')->nullable()->after("id_facebook");
            $table->integer('icon_yb')->nullable()->after("id_youtube");
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
