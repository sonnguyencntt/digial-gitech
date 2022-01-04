<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 2; $i++) {
            DB::table('categories')->insert(
                [
                    'name' => 'Internet cá nhân loại' . $i,
                ]
            );
        }
    }
}
