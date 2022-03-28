<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name' => 'Nguyen Van A',
                'number' => '0123456789',
                'address' => '123 abc',
                'email' => 'a@gmail.com'
            ],
            [
                'name' => 'Tran Van B',
                'number' => '0123458698',
                'address' => '456 abc',
                'email' => 'b@gmail.com'
            ],
            [
                'name' => 'Le Van C',
                'number' => '0123987654',
                'address' => '789 abc',
                'email' => 'c@gmail.com'
            ],
        ]);
    }
}
