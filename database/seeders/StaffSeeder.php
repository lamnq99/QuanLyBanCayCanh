<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::all()->toArray();
        // dd($user);
        foreach ($user as $item) {
            DB::table('staff_information')->insert([
                [
                    'name' => 'Nhan Vien 1',
                    'birthday' => '1999-04-04',
                    'user_id' => $item['id'],
                    'phone' => '0966237188',
                ]
            ]);
        }
    }
}
