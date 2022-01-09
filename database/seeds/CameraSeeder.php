<?php

use Illuminate\Database\Seeder;

class CameraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cameras')->insert(
            ['name' => 'Camera ngoài trời',
            'image_url' => 'sonnguyen@gmail.com',
            'price' => 50000
            ]
        );
        DB::table('cameras')->insert(
            ['name' => 'Camera trong nhà',
            'image_url' => 'sonnguyen@gmail.com',
            'price' => 50000
            ]
        );
    }
}
