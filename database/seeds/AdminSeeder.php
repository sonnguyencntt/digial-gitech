<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert(
            ['name' => 'Nguyễn Hồng Sơn',
            'email' => 'sonnguyencntt04@gmail.com',
            'password' => Hash::make('12345678'),
            ]
        );
    }
}
