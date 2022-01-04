<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert(
            ['title' => 'Điện thoại',
            'description' => 'sonnguyen@gmail.com',
            'image_url' => 'sonnguyen@gmail.com',
            'status' => 0


            ]
        );
    }
}
