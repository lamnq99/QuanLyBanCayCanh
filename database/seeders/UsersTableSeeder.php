<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'email' => 'duyhan1999@gmail.com',
            'password' => bcrypt('123456'),
        ],
        [
            'email' => 'duyhan1310@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
