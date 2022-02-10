<?php

use Illuminate\Database\Seeder;

class AdminConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin_configs')->insert(
            [
                "store_sample_code" => null
            ]
        );
    }
}
