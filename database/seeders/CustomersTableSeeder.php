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
                'name' => 'Nguyễn Văn Hoài',
                'number' => '0984706934',
                'address' => 'số 34 Minh Khai, Hai Bà Trưng, Hà Nội',
                'email' => 'a@gmail.com'
            ],
            [
                'name' => 'Nguyễn Thị Hoài An',
                'number' => '0956234456',
                'address' => 'Số 77 Lĩnh Nam, Hoàng Mai, Hà Nội',
                'email' => 'b@gmail.com'
            ],
            [
                'name' => 'Lê Văn Tuyến',
                'number' => '0368238222',
                'address' => ' Số 18 Hoàng Mai, Hoàng Mai, Hà Nội',
                'email' => 'c@gmail.com'
            ],
        ]);
    }
}
