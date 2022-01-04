<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert(
            ['name' => 'Nguyễn Hồng Sơn',
            'email' => 'sonnguyen@gmail.com',
            "address" => "Long Khánh - Đồng Nai",
            "product_id" => 1,
            "category_id" => 1,
            ]
        );
    }
}
