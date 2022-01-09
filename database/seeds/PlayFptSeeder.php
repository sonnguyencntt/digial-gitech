<?php

use Illuminate\Database\Seeder;

class PlayFptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('play_fpts')->insert(
            ['name' => 'Gói 1',
            'description' => 'sonnguyen@gmail.com',
            'price' => 10000,
            "category_id" => 1
            ]
        );
    }
}
