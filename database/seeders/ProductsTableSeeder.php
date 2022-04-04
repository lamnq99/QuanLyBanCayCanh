<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Trầu bà',
                'description' => 'Loại cây cảnh được trồng rất nhiều',
                'image' => 'https://www.fao.org.vn/wp-content/uploads/2021/02/cac-loai-cay-trau-ba.jpg',
                'height' => 70,
                'width' => 50,
                'price' => 25000,
                'amount' => 30,
                'product_type_id' => 2
            ],
            [
                'name' => 'Cây si Nhật',
                'description' => 'Loại cây cảnh được trồng rất nhiều',
                'image' => 'https://cf.shopee.vn/file/d2350807944d4ae820113f7b812b51a8',
                'height' => 70,
                'width' => 50,
                'price' => 30000,
                'amount' => 50,
                'product_type_id' => 1
            ],
            [
                'name' => 'Cây hoa giấy',
                'description' => 'Loại cây cảnh được trồng rất nhiều',
                'image' => 'https://sachico101.com/cdn/images/cach-cham-soc-hoa-giay-trong-chau-1.jpg',
                'height' => 70,
                'width' => 50,
                'price' => 10000,
                'amount' => 60,
                'product_type_id' => 3
            ],
        ]);
    }
}
