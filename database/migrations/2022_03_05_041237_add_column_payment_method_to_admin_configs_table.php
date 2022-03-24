<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnPaymentMethodToAdminConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admin_configs', function (Blueprint $table) {
            $table->string('momo_user_name')->nullable()->default(null);
            $table->string('momo_phone')->nullable()->default(null);
            $table->string('bank_user_name')->nullable()->default(null);
            $table->string('bank_name')->nullable()->default(null);
            $table->string('bank_number')->nullable()->default(null);

            $table->string('note_for_payment')->nullable()->default(null);




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admin_configs', function (Blueprint $table) {
            //
        });
    }
}
