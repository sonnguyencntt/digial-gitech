<?php

use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert(
            ['title' => 'Điện thoại',
            'image_url' => 'sonnguyen@gmail.com',
            ]
        );
    }
}
