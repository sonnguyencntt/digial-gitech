<?php

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert(
            ['full_name' => 'Nguyễn Hồng Sơn',
            'email' => 'sonnguyen@gmail.com',
            'phone_number' => '0335570811',
            'address' =>"Long Khánh - Đồng Nai",
            'note' => "Ghi chú"

            ]
        );
    }
}
