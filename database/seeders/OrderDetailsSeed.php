<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderDetails;

class OrderDetailsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $order_details= [
            [
                'orderId' => 1,
                'customerId' => 1,
                'productId' => 1,
                'orderQty' => 5,
                'unitPrice' => 100.00
            ],
            [
                'orderId' => 1,
                'customerId' => 1,
                'productId' => 2,
                'orderQty' => 2,
                'unitPrice' => 400.00
            ],
            [
                'orderId' => 1,
                'customerId' => 1,
                'productId' => 3,
                'orderQty' => 6,
                'unitPrice' => 150.00
            ],
            [
                'orderId' => 1,
                'customerId' => 1,
                'productId' => 4,
                'orderQty' => 5,
                'unitPrice' => 300.00
            ],
        ];

        OrderDetails::insert($order_details);
    }
}
