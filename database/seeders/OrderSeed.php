<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order')->insert([
            'customerId' => 1,
            'orderDate' => "2021-12-06",
            'status' => "Shipped",
            'comment' => "",
        ]);
    }
}
