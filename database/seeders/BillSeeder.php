<?php

namespace Database\Seeders;

use App\Models\Bill;
use App\Models\Customer;
use App\Models\Product;
use App\Models\StaffInformation;
use Carbon\Carbon;
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
                'total' => 50000,
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today(),
            ],
            [
                'staff_id' => 1,
                'customer_id' => 2,
                'total' => 60000,
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today(),
            ],
            [
                'staff_id' => 1,
                'customer_id' => 3,
                'total' => 70000,
                'created_at' => Carbon::today(),
                'updated_at' => Carbon::today(),
            ]
        ]);

        $bill = Bill::all()->toArray();
        $prod = Product::find(1);
        DB::table('bill_details')->insert([
            [
                'bill_id' => $bill[0]['id'],
                'product_id' => $prod->id,
                'amount' => 3,
                'unit_price' => $prod->price
            ],
            [
                'bill_id' => $bill[1]['id'],
                'product_id' => $prod->id,
                'amount' => 2,
                'unit_price' => $prod->price
            ],
            [
                'bill_id' => $bill[2]['id'],
                'product_id' => $prod->id,
                'amount' => 6,
                'unit_price' => $prod->price
            ]
        ]);
    }
}
