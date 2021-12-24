<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'code' => "P001",
                'name' => "Product 1",
                'description' => "Product 1 desc",
                'stockQty' => "10",
            ],
            [
                'code' => "P002",
                'name' => "Product 2",
                'description' => "Product 2 desc",
                'stockQty' => "10",
            ],
            [
                'code' => "P003",
                'name' => "Product 3",
                'description' => "Product 3 desc",
                'stockQty' => "10",
            ],
            [
                'code' => "P004",
                'name' => "Product 4",
                'description' => "Product 4 desc",
                'stockQty' => "10",
            ],
        ];

        Product::insert($products);

    }
}
