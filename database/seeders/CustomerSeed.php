<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CustomerSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer')->insert([
            'name' => "Anne Young",
            'phone' => "695458962",
            'address1' => "3527 Brand Road",
            'address2' => "",
            'city' => "Saskatoon",
        ]);
    }
}
