<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add4ColumCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function ($table) {
  
                $table->string("image_url")->after('name');

            

    });


    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       
    }
}
