<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_types')->insert([
            [
                'name' => 'Cay than go',
                'description' => 'Cay than go'
            ],
            [
                'name' => 'Cay than mem',
                'description' => 'Cay than mem'
            ],
            [
                'name' => 'Cay leo',
                'description' => 'Cay leo'
            ],
        ]);
    }
}
