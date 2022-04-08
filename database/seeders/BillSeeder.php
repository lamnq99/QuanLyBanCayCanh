<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Customer;
use App\Models\Product;
use App\Models\StaffInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bills')->insert([
            [
                'staff_id' => 1,
                'customer_id' => 1,
                'total' => 50000
            ]
        ]);

        $bill = Bill::all()->toArray();
        $prod = Product::find(1);
        DB::table('bill_details')->insert([
            [
                'bill_id' => $bill[0]['id'],
                'product_id' => $prod->id,
                'amount' => 2,
                'unit_price' => $prod->price
            ]
        ]);
    }
}
