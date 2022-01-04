<?php

use Illuminate\Database\Seeder;

class InternetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 2; $i++) {
            DB::table('internets')->insert(
                [
                    'name' => 'Internet cá nhân loại' . $i,
                    'price' => "20000",
                    "size" => "180",
                    'description' => "Mô tả",
                    "category_id" => 1,
                    
                ]
            );
        }
    }
}
